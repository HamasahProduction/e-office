<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\KepalaKeluarga;
use App\Models\DetailAnggotaKeluarga;
use App\Models\SDHK;
use App\Models\RT;
use App\Imports\ImportKK;

class KepalaKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $birthday       = $request->birthday==null?Carbon::now()->format('Y-m-d') : $request->birthday;
        $kepalaKeluarga = KepalaKeluarga::all();
        $penduduks      = Penduduk::active()->where('is_kepala_keluarga',false)->get();
        $rts            = RT::with(['rw','dusun'])->get();
        return view('admin.kepala_keluarga.index', compact('birthday','request','kepalaKeluarga','penduduks','rts'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_kepala_keluarga',false)->where('is_keluarga', false)->get();
        return view('admin.kepala_keluarga.create', compact('penduduks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik'       => 'required',
           
        ],[
            'nik.required'      => 'Pilih Nik kepala keluarga!',
        ]);

        $penduduk = Penduduk::where('nik', $request->nik)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $penduduk->is_kepala_keluarga =true;
        $penduduk->save();
        
        $kk = KepalaKeluarga::create([
            'nik'               => $request->nik,
            'no_kk'             => $penduduk->no_kk,
            'nama_ayah'         => strtoupper($request->nama_ayah),
            'nama_ibu'          => strtoupper($request->nama_ibu),
            'jumlah_anggota'    => 0,
        ]);

        $anggota = new DetailAnggotaKeluarga();
        $anggota->nik                   = $kk->nik;
        $anggota->id_kepala_keluarga    = $kk->id;
        $anggota->id_sdhk               = 1;
        // $anggota->hubungan_keluarga     = strtoupper('KEPALA KELUARGA');
        $anggota->nama_ayah             = strtoupper($request->nama_ayah);
        $anggota->nama_ibu              = strtoupper($request->nama_ibu);
        if($anggota->save()){
            $kk->jumlah_anggota +=1;
            $kk->save();
        }

        return redirect()->route('app.admin.kepala_keluarga.index')->withSuccess('Kepala Keluarga Berhasil ditambahkan!');
    }
    public function addMembers(Request $request)
    {
        
        $request->validate([
            'nik'                => 'required',
            'id_sdhk'            => 'required',
            'nama_ayah'          => 'required',
            'nama_ibu'           => 'required',
           
        ],[
            'nik.required'               => 'Pilih Nik Anggota keluarga!',
            'id_sdhk.required'           => 'Pilih hubungan keluarga!',
            'nama_ayah.required'         => 'Nama ayah wajib diisi!',
            'nama_ibu.required'          => 'Nama ibu wajib diisi!',
        ]);
        $kk = KepalaKeluarga::where('nik', $request->id_kepala_keluarga)->first();
        abort_if(!$kk, 400, 'Kepala Keluarga Tidak Terdaftar');
        $kk->jumlah_anggota +=1;
        $kk->save();

        $penduduk   = Penduduk::where('nik', $request->nik)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $penduduk->is_keluarga = true;
        $penduduk->save();

        DetailAnggotaKeluarga::create([
            'nik'                   => $request->nik,
            'id_kepala_keluarga'    => $kk->id,
            'id_sdhk'               => $request->id_sdhk,
            'nama_ayah'             => strtoupper($request->nama_ayah),
            'nama_ibu'              => strtoupper($request->nama_ibu),
        ]);

        return redirect()->back()->withSuccess('Anggota Keluarga Berhasil ditambahkan!');
    }
    public function detail(Request $request, $nik)
    {    
        $penduduks  = Penduduk::active()->where('is_keluarga', false)->get();
        $kk         = KepalaKeluarga::where('nik', $nik)->first();
        abort_if(!$kk, 400, 'Kepala Keluarga Tidak Terdaftar');
        
        $sdhk       = SDHK::get();
        $keluarga   = DetailAnggotaKeluarga::with('kepalaKeluarga')->where('id_kepala_keluarga', $kk->id)->get(); 
        return view('admin.kepala_keluarga.detail', compact('penduduks','kk', 'keluarga','sdhk'));
    }

    public function removeMember($id)
    {
        $anggota = DetailAnggotaKeluarga::find($id);
        abort_if(!$anggota, 400, 'Anggota Keluarga Tidak Terdaftar');
        
        $penduduk   = Penduduk::where('nik', $anggota->nik)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $penduduk->is_keluarga = false;

        if ($penduduk->save()) {
            $anggota->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Anggota Keluarga Berhasil Dihapus!.',
        ]); 
    }

    public function import(Request $request)
    {
        $data = (new ImportKK)->toArray($request->file('file'));
        $firstRow =$data[0][0];

        if (
            !array_key_exists('nik', $firstRow) || 
            !array_key_exists('nomor_kk', $firstRow) || 
            !array_key_exists('nama_ayah', $firstRow)||
            !array_key_exists('kode_sdhk', $firstRow)||
            !array_key_exists('nama_ibu', $firstRow)
            ) 
        {
			return redirect()->route('app.admin.kepala_keluarga.index')->withError('import digagalkan karena format tidak sesuai!');
		}

        $inserted = 0;
        $insertedAnggota = 0;
		$error = [];

        foreach ($data[0] as $row) 
		{

            $cekPendudukTerdaftar = Penduduk::where('nik',$row['nik'])->first();
			if (!empty($cekPendudukTerdaftar))
            {
                if (!empty($row['nik'])) 
                {
                    $checknik = KepalaKeluarga::where('nik',$row['nik'])->count();
                    if(strlen($row['nik']) > 16 || strlen($row['nomor_kk']) > 16 )
                    {
                        $nik = '- NIK tidak sesuai format, NIK maksimal 16 karakter';
                        $no_kk = '- NO KK tidak sesuai format, NO KK maksimal 16 karakter';
                        $error[] = $row['nik']." - ".$row['nama_ayah']." - ".$row['nama_ibu'].",<br>".$no_kk;
                    }
                    if ($checknik > 0) 
                    {
                        $nikterpakai = KepalaKeluarga::where('nik',$row['nik'])->first();
                        $error[] = $row['nik']." NIK sudah terdaftar oleh ".$nikterpakai->penduduk->nama_lengkap." lain!";
                    }
                    else
                    {
                        $cekKK = KepalaKeluarga::where('nik',$row['nik'])->first();
                        $sdhk = SDHK::where('id', $row['kode_sdhk'])->first();
                        if (empty($cekKK)) {
                            if(!empty($sdhk) && $sdhk->id == 1)
                            {
                                $inserted++;
                                
                                $kk = KepalaKeluarga::create([
                                    'nik'               => $row['nik'],
                                    'no_kk'             => $row['nomor_kk'],
                                    'nama_ayah'         => $row['nama_ayah'],
                                    'nama_ibu'          => $row['nama_ibu'],
                                    'created_at'        => date('Y-m-d H:i:s')
                                ]);
                                $anggota = DetailAnggotaKeluarga::create([
                                    'id_kepala_keluarga'=> $kk->id,
                                    'id_sdhk'           => $sdhk->id,
                                    'nik'               => $row['nik'],
                                    'no_kk'             => $row['nomor_kk'],
                                    'nama_ayah'         => $row['nama_ayah'],
                                    'nama_ibu'          => $row['nama_ibu'],
                                    'created_at'        => date('Y-m-d H:i:s')
                                ]);
                                $isKepala = Penduduk::where('nik',$kk->nik)->first();
                                $isKepala->is_kepala_keluarga = true;
                                $isKepala->is_keluarga = true;
                                $isKepala->save();

                                $kk->jumlah_anggota +=1;
                                $kk->save();
                            }
                            
                            if(!empty($sdhk) && $sdhk->id != '1')
                            {
                                $cekAnggota = DetailAnggotaKeluarga::where('nik',$row['nik'])->first();
                                if(empty($cekAnggota))
                                {
                                    $kk = KepalaKeluarga::where('no_kk', $row['nomor_kk'])->first();
                                    if (!empty($kk)) {
    
                                        $insertedAnggota++;
                                        $anggota = DetailAnggotaKeluarga::create([
                                            'id_kepala_keluarga'=> $kk->id,
                                            'id_sdhk'           => $sdhk->id,
                                            'nik'               => $row['nik'],
                                            'no_kk'             => $row['nomor_kk'],
                                            'nama_ayah'         => $row['nama_ayah'],
                                            'nama_ibu'          => $row['nama_ibu'],
                                            'created_at'        => date('Y-m-d H:i:s')
                                        ]);

                                        // update status keluarga di tabel penduduk
                                        $isKepala = Penduduk::where('nik',$anggota->nik)->first();
                                        $isKepala->is_keluarga = true;
                                        $isKepala->save();

                                        // tambah jumlah anggota keluarga
                                        $kk->jumlah_anggota +=1;
                                        $kk->save();
                                    }
                                }
                            }
                        }else{
                            $error[] = $row['nik']." Oops..! NOMOR NIK SUDAH TERDAFTAR SEBAGAI KEPALA KELUARGA";
                        }
                    }
                }
            } 
            else {
                $error[] = " Oops..! ".$row['nik']." NIK TIDAK TERDAFTAR SEBAGAI PENDUDUK CIMARA";
            }
		}
        
        if ($inserted == 0) 
		{
			return redirect()->route('app.admin.kepala_keluarga.index')->with('errorimport',$error);
		}
        return redirect()->route('app.admin.kepala_keluarga.index')->withSuccess('IMPORT BERHASIL, kepala keluarga berhasil diimport!')->with('errorimport',$error);;
    }

    public function export(Request $request)
    {
        // dd($request->all());
    }
}
