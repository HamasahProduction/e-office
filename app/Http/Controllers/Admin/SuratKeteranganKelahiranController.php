<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuratKelahiranExport;
use App\Models\KeteranganKelahiran;
use App\Models\KepalaKeluarga;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\RT;
use App\Models\User;
use Carbon\Carbon;


class SuratKeteranganKelahiranController extends Controller
{
    public function index(Request $request)
    {
        $query      = KeteranganKelahiran::orderBy('tgl_surat','desc');
        $startdate  = date('Y-m') . '-01';
        $enddate    = date('Y-m-d');

        if( $request->filled('startdate'))
        {
            $startdate = $request->startdate;
        }
        if( $request->filled('enddate'))
        {
            $enddate = $request->enddate;
        }
        $skk = $query->whereBetween(\DB::RAW('date(tgl_surat)'), [$startdate, $enddate])->get();
        return view('admin.layanan_umum.sk_kelahiran.index', compact('skk','startdate','enddate','request'));
    }

    public function create()
    {
        $kelompokKeluarga   = KepalaKeluarga::with('anggotaKeluargas')->get();
        $penduduks          = Penduduk::active()->where('is_mutasi', false)->get();
        $rt                 = RT::with(['rw','dusun'])->get();
        return view('admin.layanan_umum.sk_kelahiran.create', compact('kelompokKeluarga','penduduks','rt'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'nama_lengkap'      => 'required',
            'tempat_lahir'      => 'required',
            'jenis_kelamin'     => 'required',
            'agama'             => 'required',
            'tanggal_lahir'     => 'required|date',
            // 'tgl_surat'         => 'required|date',
           
        ],[
            'nik.required'      => 'Nik penduduk harus dipilih!',
            'tempat_lahir'      => 'Tempat lahir harus diisi!',
            'jenis_kelamin'     => 'Jenis kelamin wajib dipilih!',
            'agama'             => 'Agama wajib dipilih!',
            'tanggal_lahir'     => 'Tanggal lahir wajib dipilih!',
        ]);

        $no_kk         = null;
        $province_id   = null;
        $regency_id    = null;
        $district_id   = null;
        $village_id    = null;
        $alamat        = null;

        $ayah   = Penduduk::where('nik',$request->nik_ayah)->first();
        abort_if(!$ayah, 400, 'NIK Ayah sebagai Penduduk Tidak Terdaftar');
        
        $ibu   = Penduduk::where('nik',$request->nik_ibu)->first();
        abort_if(!$ibu, 400, 'NIK Ayah sebagai Penduduk Tidak Terdaftar');
        if($ayah && $ibu)
        {
            $no_kk         = $ayah->no_kk;
            $province_id   = $ayah->province_id;
            $regency_id    = $ayah->regency_id;
            $district_id   = $ayah->district_id;
            $village_id    = $ayah->village_id;
            $alamat        = $ayah->Rt->dusun.' RT: '.$ayah->Rt->nomor.' RW: ' .$ayah->Rt->rw;
        }

        $cekpenduduk = Penduduk::where('nik', $request->nik)->where('is_mutasi', false)->first();
        if ($cekpenduduk) {
            return redirect()->route('app.admin.surat.skk.index')->withError('SIMPAN PENDUDUDUK GAGAL!! NOMOR NIK SUDAH TERDAFTAR!');
        }
        Penduduk::create([
            'nik'                   => $request->nik,
            'no_kk'                 => $no_kk,
            'nama_lengkap'          => strtoupper($request->nama_lengkap),
            'tempat_lahir'          => strtoupper($request->tempat_lahir),
            'tgl_lahir'             => $request->tanggal_lahir,
            'id_pendidikan'         => 1,
            'agama'                 => strtoupper($request->agama),
            'id_status_perkawinan'  => 1,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'id_pekerjaan'          => 1,
            'id_sdhk'               => 4,
            'nama_ayah'             => strtoupper($ayah->nama_lengkap),
            'nama_ibu'              => strtoupper($ibu->nama_lengkap),
            'alamat'                => $alamat,
            'rt_id'                 => $request->rt_id,
            'province_id'           => $province_id,
            'regency_id'            => $regency_id,
            'district_id'           => $district_id,
            'village_id'            => $village_id,
            'kewarganegaraan'       => strtoupper('WNI'),
            'status_penduduk'       => 'tetap',
            'is_live'               => true,
            'is_mutasi'             => false,
            'is_kepala_keluarga'    => false,
            'is_keluarga'           => false,
        ]);

        User::create([
            'name'      => $request->nama_lengkap,
            'username'  => $request->nik,
            'role'      => 'warga',
            'password'  => bcrypt(str_replace('-', '',$request->tanggal_lahir)),
            'is_active' => true,
        ]);

        $lastRecord = KeteranganKelahiran::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }

        $alamat_anak = RT::find($request->rt_id);
        $surat       = DaftarSurat::find(12);
        KeteranganKelahiran::create([
            'nomor_surat'       => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat'     => $nextNomorUrut,
            'nik'               => $request->nik,
            'nik_kk'            => $request->nik_kk??Null,
            'nik_ayah'          => $request->nik_ayah??Null,
            'nik_ibu'           => $request->nik_ibu??Null,
            'nama'              => $request->nama_lengkap,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tanggal_lahir,
            'agama'             => $request->agama,
            'alamat'            => $alamat_anak==null? '':strtoupper($alamat_anak),
            'tgl_surat'         => now(),
            'is_cetak'          => false,
        ]);
        
        return redirect()->route('app.admin.surat.skk.index')->withSuccess('Surat Keterangan Kelahiran Berhasil ditambahkan!');
    }

    public function createByKeluarga()
    {
        $kelompokKeluarga   = KepalaKeluarga::with('anggotaKeluargas')->get();
        $penduduks          = Penduduk::active()->where('is_mutasi', false)->get();
        $rt                 = RT::with(['rw','dusun'])->get();
        return view('admin.layanan_umum.sk_kelahiran.create_by_kk', compact('kelompokKeluarga','penduduks','rt'));
    }

    public function storeByKK(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'nama_lengkap'      => 'required',
            'tempat_lahir'      => 'required',
            'jenis_kelamin'     => 'required',
            'agama'             => 'required',
            'tanggal_lahir'     => 'required|date',
           
        ],[
            'nik.required'      => 'Nik penduduk harus dipilih!',
            'tempat_lahir'      => 'Tempat lahir harus diisi!',
            'jenis_kelamin'     => 'Jenis kelamin wajib dipilih!',
            'agama'             => 'Agama wajib dipilih!',
            'tanggal_lahir'     => 'Tanggal lahir wajib dipilih!',
        ]);

        $no_kk         = null;
        $province_id   = null;
        $regency_id    = null;
        $district_id   = null;
        $village_id    = null;
        $alamat        = null;

        $cekpenduduk = KepalaKeluarga::with('anggotaKeluargas')->where('nik', $request->nik_kk)->first();
        $istri       = $cekpenduduk->anggotaKeluargas->where('id_sdhk', 2)->first();
        
        $ayah        = Penduduk::where('nik',$cekpenduduk->nik)->first();
        abort_if(!$ayah, 400, 'NIK Ayah sebagai Penduduk Tidak Terdaftar');
        
        $ibu         = Penduduk::where('nik',$istri->nik)->first();
        abort_if(!$ibu, 400, 'NIK Ayah sebagai Penduduk Tidak Terdaftar');
        if($ayah && $ibu)
        {
            $no_kk         = $ayah->no_kk;
            $province_id   = $ayah->province_id;
            $regency_id    = $ayah->regency_id;
            $district_id   = $ayah->district_id;
            $village_id    = $ayah->village_id;
            $alamat        = $ayah->Rt->dusun.' RT: '.$ayah->Rt->nomor.' RW: ' .$ayah->Rt->rw;
        }

        $cekpenduduk = Penduduk::where('nik', $request->nik)->where('is_mutasi', false)->first();
        if ($cekpenduduk) {
            return redirect()->route('app.admin.surat.skk.index')->withError('SIMPAN PENDUDUDUK GAGAL!! NOMOR NIK SUDAH TERDAFTAR!');
        }
        Penduduk::create([
            'nik'                   => $request->nik,
            'no_kk'                 => $no_kk,
            'nama_lengkap'          => strtoupper($request->nama_lengkap),
            'tempat_lahir'          => strtoupper($request->tempat_lahir),
            'tgl_lahir'             => $request->tanggal_lahir,
            'id_pendidikan'         => 1,
            'agama'                 => strtoupper($request->agama),
            'id_status_perkawinan'  => 1,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'id_pekerjaan'          => 1,
            'id_sdhk'               => 4,
            'nama_ayah'             => strtoupper($ayah->nama_lengkap),
            'nama_ibu'              => strtoupper($ibu->nama_lengkap),
            'alamat'                => $alamat,
            'rt_id'                 => $request->rt_id,
            'province_id'           => $province_id,
            'regency_id'            => $regency_id,
            'district_id'           => $district_id,
            'village_id'            => $village_id,
            'kewarganegaraan'       => strtoupper('WNI'),
            'status_penduduk'       => 'tetap',
            'is_live'               => true,
            'is_mutasi'             => false,
            'is_kepala_keluarga'    => false,
            'is_keluarga'           => false,
        ]);

        User::create([
            'name'      => $request->nama_lengkap,
            'username'  => $request->nik,
            'role'      => 'warga',
            'password'  => bcrypt(str_replace('-', '',$request->tanggal_lahir)),
            'is_active' => true,
        ]);

        $lastRecord = KeteranganKelahiran::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }

        $surat       = DaftarSurat::find(12);
        KeteranganKelahiran::create([
            'nomor_surat'       => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat'     => $nextNomorUrut,
            'nik'               => $request->nik,
            'nik_kk'            => $request->nik_kk??Null,
            'nik_ayah'          => $ayah->nik??Null,
            'nik_ibu'           => $ibu->nik??Null,
            'nama'              => $request->nama_lengkap,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tanggal_lahir,
            'agama'             => $request->agama,
            'alamat'            => $alamat==null? '':strtoupper($alamat),
            'tgl_surat'         => now(),
            'is_cetak'          => false,
        ]);

        return redirect()->route('app.admin.surat.skk.index')->withSuccess('Surat Keterangan Kelahiran Berhasil ditambahkan!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = KeteranganKelahiran::with(['penduduk','ayah','ibu'])->where('no_urut_surat', $request->no)->first();
        abort_if(!$data, 400, 'Surat Tidak Terdaftar');
        
        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $jk         = $data->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->penduduk->tempat_lahir.', '.Carbon::parse($data->penduduk->tgl_lahir)->isoFormat('dddd D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        $alamat     = 'DESA '.$data->penduduk->village->name.' KECAMATAN '. $data->penduduk->district->name.' '.$data->penduduk->regency->name.' - '.$data->penduduk->province->name;
        
        return response()->json(
            [
                'data'=>$data,
                'ttl'=>$tgl_lahir,
                'tgl_surat'=>$tgl_surat,
                'no_surat'=>$no_surat,
                'jk'=>$jk,
                'alamat'=>$alamat
                
            ,200]);
    }

    public function cetak($id)
    {
        $data       = KeteranganKelahiran::find($id);
        abort_if(!$data, 400, 'data Keterangan Kelahiran tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Kelahiran Sudah di Cetak!',
            'data'      => $data  
        ]);
    }

    public function export(Request $request)
    {
        $namaFile = 'Data-Surat-Kelahiran-'.now().'.xlsx';
        return Excel::download(new SuratKelahiranExport, $namaFile);
    }

}
