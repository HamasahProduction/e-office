<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailAnggotaKeluarga;
use App\Models\KepalaKeluarga;
use App\Models\Penduduk;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\SDHK;
use App\Models\StatusPerkawinan;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use App\Models\RT;
use App\Models\User;
use Carbon\Carbon;

use App\Imports\ImportPenduduk;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $birthday   = $request->birthday==null?'' : $request->birthday;
        $query      = Penduduk::active();
        if($request->has('birthday') && !empty($request->input('birthday')))
        {
            $query->whereDate('tgl_lahir','=', $request->birthday);
        }
        if($request->has('status') && !empty($request->input('status')))
        {
            $query->where('status_penduduk','=', $request->status);
        }
        if($request->has('rt_id') && !empty($request->input('rt_id')))
        {
            $query->where('rt_id','=', $request->rt_id);
        }
        $penduduks  = $query->get();
        $rts        = RT::with(['rw','dusun'])->get();
        return view('admin.penduduk.index', compact('birthday','request','penduduks','rts'));
    }

    public function create()
    {
        $province           = Province::all();
        $rt                 = RT::with(['rw','dusun'])->get();
        $pekerjaan          = Pekerjaan::get();
        $pendidikan         = Pendidikan::get();
        $sdhk               = SDHK::get();
        $statusPerkawinan   = StatusPerkawinan::get();
        return view('admin.penduduk.create', compact('province','rt','pekerjaan','pendidikan','sdhk','statusPerkawinan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'                   => 'required|max:255',
            'no_kk'                 => 'required|max:255',
            'nama_lengkap'          => 'required|max:255',
            'tempat_lahir'          => 'required|max:255',
            'tanggal_lahir'         => 'required|date',
            'id_pendidikan'         => 'required',
            'agama'                 => 'required|max:255',
            'id_status_perkawinan'  => 'required',
            'jenis_kelamin'         => 'required|max:255',
            'id_pekerjaan'          => 'required',
            'id_sdhk'               => 'required',
            'nama_ayah'             => 'required|max:255',
            'nama_ibu'              => 'required|max:255',
            'alamat'                => 'required|max:255',
            'rt_id'                 => 'required|integer',
            'province_id'           => 'required|integer',
            'regency_id'            => 'required|integer',
            'district_id'           => 'required|integer',
            'village_id'            => 'required|integer',
            'kewarganegaraan'       => 'required',
           
        ],[
            'nik'                   => 'Nik wajib diisi!',
            'nik.max'               => 'Maksimal 16 Digit!',
            'no_kk'                 => 'No KK wajib diisi!',
            'no_kk.max'             => 'Maksimal 16 Digit!',
            'nama_lengkap'          => 'required|max:255',
            'tempat_lahir'          => 'Tempat lahir wajib diisi!',
            'tempat_lahir.max'      => 'Maksimal 255 karakter!',
            'tanggal_lahir'         => 'required',
            'id_pendidikan'         => 'Pendidikan wajib dipilih!',
            'agama'                 => 'Agama wajib dipilih!',
            'id_status_perkawinan'  => 'Status pernikahan wajib dipilih!',
            'jenis_kelamin'         => 'Gender wajib dipilih!',
            'id_pekerjaan'          => 'Pekerjaan wajib dipilih!',
            'id_sdhk'               => 'Hubungan Keluarga wajib dipilih!',
            'nama_ayah'             => 'Nama Ayah wajib diisi!',
            'nama_ayah.max'         => 'Maksimal 255 digit',
            'nama_ibu'              => 'Nama Ibu Wajib diisi!',
            'nama_ibu.max'          => 'Maksimal 16 digit',
            'alamat'                => 'Alamat wajib diisi!',
            'rt_id'                 => 'RT Wajib dipilih',
            'province_id'           => 'Provinsi wajib dipilih',
            'regency_id'            => 'Kabupaten Kota wajib dipilih',
            'district_id'           => 'Kecamatan wajib dipilih',
            'village_id'            => 'Desa wajib dipilih',
            'kewarganegaraan'       => 'Kewarganegaraan wajib dipilih',
        ]);

        $cekpenduduk = Penduduk::where('nik', $request->nik)->first();
        if ($cekpenduduk) {
            return redirect()->route('app.admin.penduduk.index')->withError('SIMPAN PENDUDUDUK GAGAL!! NOMOR NIK SUDAH TERDAFTAR!');
        }
        // abort_if(!$cekpenduduk, 400, 'NIK Sudah Terdaftar');
        Penduduk::create([
            'nik'                   => $request->nik,
            'no_kk'                 => $request->no_kk,
            'nama_lengkap'          => strtoupper($request->nama_lengkap),
            'tempat_lahir'          => strtoupper($request->tempat_lahir),
            'tgl_lahir'             => $request->tanggal_lahir,
            'id_pendidikan'         => $request->id_pendidikan,
            'agama'                 => strtoupper($request->agama),
            'id_status_perkawinan'  => $request->id_status_perkawinan,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'id_pekerjaan'          => $request->id_pekerjaan,
            'id_sdhk'               => $request->id_sdhk,
            'nama_ayah'             => strtoupper($request->nama_ayah),
            'nama_ibu'              => strtoupper($request->nama_ibu),
            'alamat'                => $request->alamat,
            'rt_id'                 => $request->rt_id,
            'province_id'           => $request->province_id,
            'regency_id'            => $request->regency_id,
            'district_id'           => $request->district_id,
            'village_id'            => $request->village_id,
            'kewarganegaraan'       => strtoupper($request->kewarganegaraan),
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

        return redirect()->route('app.admin.penduduk.index')->withSuccess('Penduduk Berhasil ditambahkan!');
    }
    public function edit($nik)
    {
        $penduduk   = Penduduk::where('nik',$nik)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');

        $rt                 = RT::with(['rw','dusun'])->get();
        $province           = Province::get();
        $regency            = Regency::where('province_id',$penduduk->province_id)->get();
        $district           = District::where('regency_id',$penduduk->regency_id)->get();
        $village            = Village::where('district_id',$penduduk->district_id)->get();
        $pekerjaan          = Pekerjaan::get();
        $pendidikan         = Pendidikan::get();
        $sdhk               = SDHK::get();
        $statusPerkawinan   = StatusPerkawinan::get();

        return view('admin.penduduk.edit', compact('penduduk', 'rt','province','regency','district','village','pekerjaan','pendidikan','sdhk','statusPerkawinan'));
    }

    public function update(Request $request, $nik)
    {
        $request->validate([
            'nik'                   => 'required|max:255',
            'no_kk'                 => 'required|max:255',
            'nama_lengkap'          => 'required|max:255',
            'tempat_lahir'          => 'required|max:255',
            'tanggal_lahir'         => 'required|date',
            'id_pendidikan'         => 'required',
            'agama'                 => 'required|max:255',
            'id_status_perkawinan'  => 'required',
            'jenis_kelamin'         => 'required|max:255',
            'id_pekerjaan'          => 'required',
            'id_sdhk'               => 'required',
            'nama_ayah'             => 'required|max:255',
            'nama_ibu'              => 'required|max:255',
            'alamat'                => 'required|max:255',
            'rt_id'                 => 'required|integer',
            'province_id'           => 'required|integer',
            'regency_id'            => 'required|integer',
            'district_id'           => 'required|integer',
            'village_id'            => 'required|integer',
            'kewarganegaraan'       => 'required',
           
        ],[
            'nik'                   => 'Nik wajib diisi!',
            'nik.max'               => 'Maksimal 16 Digit!',
            'no_kk'                 => 'No KK wajib diisi!',
            'no_kk.max'             => 'Maksimal 16 Digit!',
            'nama_lengkap'          => 'required|max:255',
            'tempat_lahir'          => 'Tempat lahir wajib diisi!',
            'tempat_lahir.max'      => 'Maksimal 255 karakter!',
            'tanggal_lahir'         => 'required',
            'id_pendidikan'         => 'Pendidikan wajib dipilih!',
            'agama'                 => 'Agama wajib dipilih!',
            'id_status_perkawinan'  => 'Status pernikahan wajib dipilih!',
            'jenis_kelamin'         => 'Gender wajib dipilih!',
            'id_pekerjaan'          => 'Pekerjaan wajib dipilih!',
            'id_sdhk'               => 'Hubungan Keluarga wajib dipilih!',
            'nama_ayah'             => 'Nama Ayah wajib diisi!',
            'nama_ayah.max'         => 'Maksimal 255 digit',
            'nama_ibu'              => 'Nama Ibu Wajib diisi!',
            'nama_ibu.max'          => 'Maksimal 16 digit',
            'alamat'                => 'Alamat wajib diisi!',
            'rt_id'                 => 'RT Wajib dipilih',
            'province_id'           => 'Provinsi wajib dipilih',
            'regency_id'            => 'Kabupaten Kota wajib dipilih',
            'district_id'           => 'Kecamatan wajib dipilih',
            'village_id'            => 'Desa wajib dipilih',
            'kewarganegaraan'       => 'Kewarganegaraan wajib dipilih',
        ]);
        $penduduk = Penduduk::where('nik',$nik)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        
        $penduduk->nik                  = $request->nik;
        $penduduk->no_kk                = $request->no_kk;
        $penduduk->nama_lengkap         = strtoupper($request->nama_lengkap);
        $penduduk->tempat_lahir         = strtoupper($request->tempat_lahir);
        $penduduk->tgl_lahir            = $request->tanggal_lahir;
        $penduduk->id_pendidikan        = strtoupper($request->id_pendidikan);
        $penduduk->agama                = strtoupper($request->agama);
        $penduduk->id_status_perkawinan = strtoupper($request->id_status_perkawinan);
        $penduduk->jenis_kelamin        = $request->jenis_kelamin;
        $penduduk->id_pekerjaan         = strtoupper($request->id_pekerjaan);
        $penduduk->id_sdhk              = strtoupper($request->id_sdhk);
        $penduduk->nama_ayah            = strtoupper($request->nama_ayah);
        $penduduk->nama_ibu             = strtoupper($request->nama_ibu);
        $penduduk->alamat               = $request->alamat;
        $penduduk->rt_id                = $request->rt_id;
        $penduduk->province_id          = $request->province_id;
        $penduduk->regency_id           = $request->regency_id;
        $penduduk->district_id          = $request->district_id;
        $penduduk->village_id           = $request->village_id;
        $penduduk->kewarganegaraan      = strtoupper($request->kewarganegaraan);
        // $penduduk->is_live               = true;
        // $penduduk->is_mutasi             = true;
        // $penduduk->is_kepala_keluarga    = true;
        // $penduduk->is_keluarga           = true;
        // $penduduk->status_penduduk       = 'tetap';

        if($penduduk->save())
        {
            User::create([
                'name'      => $request->nama_lengkap,
                'username'  => $request->nik,
                'role'      => 'warga',
                'password'  => bcrypt(str_replace('-', '',$request->tanggal_lahir)),
                'is_active' => true,
            ]);
        }

        return redirect()->route('app.admin.penduduk.index')->withSuccess('Penduduk Berhasil diperbaharui!');
    }

    public function detail($nik)
    {
        $penduduk   = Penduduk::where('nik',$nik)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        
       if ($penduduk->is_kepala_keluarga == true) {
            $kk         = KepalaKeluarga::where('nik', $penduduk->nik)->first();
            abort_if(!$kk, 400, 'Kepala Keluarga Tidak Terdaftar');
       } else {
            if ($penduduk->is_keluarga == true) {
                $anggota         = DetailAnggotaKeluarga::where('nik', $penduduk->nik)->first();
                abort_if(!$anggota, 400, 'Kepala Keluarga Tidak Terdaftar');
                
                $kk         = KepalaKeluarga::where('nik', $anggota->kepalaKeluarga->nik)->first();
                abort_if(!$kk, 400, 'Kepala Keluarga Tidak Terdaftar');
            } else{
               $kk = null;
            }
       }
       
        
        return view('admin.penduduk.detail_penduduk', compact('penduduk','kk'));
    }

    public function pendudukLahir()
    {
        return view('admin.penduduk.penduduk_lahir');
    }
    // get RW
    public function getRw(Request $request)
    {
        $rt = RT::firstWhere('id', $request->id);
        $rw = $rt->rw->nomor;
        $dusun = $rt->dusun->nama_dusun;
        // return response()->json($data, 200);
        return response()->json([
            'rt' => $rt,
            'rw' => $rw,
            'dusun' => $dusun,
        ]);
    }

    public function getRegency(Request $request)
    {
        $data = Regency::where('province_id', $request->id)->get();
        return response()->json($data, 200);
    }

    public function getDistrict(Request $request)
    {
        $data = District::where('regency_id', $request->id)->get();
        return response()->json($data, 200);
    }

    public function getVillage(Request $request)
    {
        $data = Village::where('district_id', $request->id)->get();
        return response()->json($data, 200);
    }

    public function mutasiPenduduk(Request $request)
    {
        $birthday = $request->birthday==null?Carbon::now()->format('Y-m-d') : $request->birthday;
        return view('admin.penduduk.mutasi.mutasi_penduduk', compact('birthday','request'));
    }


    public function pendudukMeninggal(Request $request)
    {
        $birthday = $request->birthday==null?Carbon::now()->format('Y-m-d') : $request->birthday;
        return view('admin.penduduk.meninggal.penduduk_meninggal', compact('birthday','request'));
    }

    public function import(Request $request)
    {
        $data = (new ImportPenduduk)->toArray($request->file('file'));
        $firstRow =$data[0][0];
        if (
            !array_key_exists('nomor_kk', $firstRow) || 
            !array_key_exists('nik', $firstRow) || 
            !array_key_exists('nama_lengkap', $firstRow) || 
            !array_key_exists('tempat_lahir', $firstRow) || 
            !array_key_exists('tgl_lahir', $firstRow) || 
            !array_key_exists('tgl_lahir', $firstRow) || 
            !array_key_exists('pekerjaan', $firstRow)||
            !array_key_exists('jenis_kelamin', $firstRow)||
            !array_key_exists('warga_negara', $firstRow)||
            !array_key_exists('agama', $firstRow)||
            !array_key_exists('status_pernikahan', $firstRow)||
            !array_key_exists('hubungan_keluarga', $firstRow)||
            !array_key_exists('nama_ayah', $firstRow)||
            !array_key_exists('nama_ibu', $firstRow)||
            !array_key_exists('rt', $firstRow)||
            !array_key_exists('rw', $firstRow)||
            !array_key_exists('dusun', $firstRow)||
            !array_key_exists('provinsi', $firstRow)||
            !array_key_exists('kabupaten', $firstRow)||
            !array_key_exists('kecamatan', $firstRow)||
            !array_key_exists('pendidikan', $firstRow)||
            !array_key_exists('desa', $firstRow)
            ) 
        {
			return redirect()->route('app.admin.penduduk.index')->withError('import digagalkan karena format tidak sesuai!');
		}
        $inserted = 0;
        $insertedUser = 0;
		$error = [];

        foreach ($data[0] as $row) 
		{

			if (!empty($row['nik'])) 
			{
				$checknik = Penduduk::where('nik',$row['nik'])->count();
				if(strlen($row['nik']) > 16 || strlen($row['nomor_kk']) > 16 )
				{
					$nik = '- NIK tidak sesuai format, NIK maksimal 16 karakter';
					$no_kk = '- NO KK tidak sesuai format, NO KK maksimal 16 karakter';
					$error[] = $row['nis']." - ".$row['nama_lengkap'].",<br>".$no_kk;
				}
				if ($checknik > 0) 
				{
                    $nikterpakai = Penduduk::where('nik',$row['nik'])->first();
					$error[] = $row['nik']." - ".$row['nama_lengkap'].", NIK sudah terdaftar oleh ".$nikterpakai->nama_lengkap." lain!";
				}
				else
				{
					$timestamp = is_numeric($row['tgl_lahir']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row['tgl_lahir']) : strtotime($row['tanggal_lahir']);
                    
                    $rt                 = RT::where('nomor', $row['rt'])->where('rw', $row['rw'])->where('dusun', $row['dusun'])->first();
                    $statusPerkawinan   = StatusPerkawinan::where('keterangan', $row['status_pernikahan'])->first();
                    $pekerjaan          = Pekerjaan::where('keterangan', $row['pekerjaan'])->first();
                    $sdhk               = SDHK::where('keterangan', $row['hubungan_keluarga'])->first();
                    $pendidikan         = Pendidikan::where('keterangan', $row['pendidikan'])->first();
                    if (empty($pendidikan)) {
                        $error[] = $row['pendidikan']." Oops..! DATA PENDIDIKAN TIDAK TERDAFTAR DALAM SISTEM. SILAHKAN CEK PADA MENU PENGATURAN. PADA NIK :".$row['nik'];
                        return redirect()->route('app.admin.penduduk.index')->with('errorimport',$error);
                    }
                    if (empty($pekerjaan)) {
                        $error[] = $row['pekerjaan']." Oops..! DATA PEKERJAAN TIDAK TERDAFTAR DALAM SISTEM. SILAHKAN CEK PADA MENU PENGATURAN. PADA NIK :".$row['nik'];
                        return redirect()->route('app.admin.penduduk.index')->with('errorimport',$error);
                    }
                    if (empty($rt)) {
                        $error[] = $row['dusun'].' RT '.$row['rt'].' RW '.$row['rw']." Oops..! DATA RT TIDAK TERDAFTAR DALAM SISTEM. PADA NIK :".$row['nik'];
                        return redirect()->route('app.admin.penduduk.index')->with('errorimport',$error);
                    }
                    if (empty($sdhk)) {
                        $error[] = $row['hubungan_keluarga']." Oops..! DATA HUBUNGAN KELUARGA TIDAK TERDAFTAR DALAM SISTEM. SILAHKAN CEK PADA MENU PENGATURAN. PADA NIK :".$row['nik'];
                        return redirect()->route('app.admin.penduduk.index')->with('errorimport',$error);
                    }

                    $insertedUser++;
                    $user = User::create([
                        'name'      => $row['nama_lengkap'],
                        'username'  => $row['nik'],
                        'role'      => 'warga',
                        'password'  => bcrypt(str_replace('-', '',date('Y-m-d',$timestamp))),
                        'is_active' => true,
                    ]);
					if($user)
                    {
                        $inserted++;
                        Penduduk::create([
                            'nik'                   => $row['nik'],
                            'no_kk'                 => $row['nomor_kk'],
                            'nama_lengkap'          => $row['nama_lengkap'],
                            'tempat_lahir'          => $row['tempat_lahir'],
                            'tgl_lahir'             => date('Y-m-d',$timestamp),
                            'agama'                 => strtoupper('islam'),
                            'id_pendidikan'         => !empty($pendidikan->id)?$pendidikan->id:NULL,
                            'id_status_perkawinan'  => !empty($statusPerkawinan->id)?$statusPerkawinan->id:NULL,
                            'id_pekerjaan'          => !empty($pekerjaan->id)?$pekerjaan->id:NULL,
                            'id_sdhk'               => $sdhk->id??NULL,
                            'jenis_kelamin'         => $row['jenis_kelamin'],
                            'nama_ayah'             => $row['nama_ayah'],
                            'nama_ibu'              => $row['nama_ibu'],
                            'alamat'                => !empty($row['alamat']) ? $row['alamat'] : $rt->dusun.' RT: '.$rt->nomor.' RW : '.$rt->rw.' Desa Cimara Kecamatan Cibeureum Kabupaten Kuningan Jawa Barat',
                            'rt_id'                 => $rt->id,
                            'user_id'               => $user->id,
                            'province_id'           => $row['provinsi'],
                            'regency_id'            => $row['kabupaten'],
                            'district_id'           => $row['kecamatan'],
                            'village_id'            => $row['desa'],
                            'status_penduduk'       => 'tetap',
                            'is_live'               => true,
                            'is_mutasi'             => false,
                            'is_kepala_keluarga'    => false,
                            'is_keluarga'           => false,
                            'kewarganegaraan'       => $row['warga_negara'],
                            'created_at'            => date('Y-m-d H:i:s')
                        ]);
                    }
				}
			}

		}
        if ($inserted == 0) 
		{
			return redirect()->route('app.admin.penduduk.index')->with('errorimport',$error);
		}
        return redirect()->route('app.admin.penduduk.index')->withSuccess('IMPORT BERHASIL, penduduk berhasil diimport!')->with('errorimport',$error);;
    }

    public function export(Request $request)
    {
        // dd($request->all());
    }
}
