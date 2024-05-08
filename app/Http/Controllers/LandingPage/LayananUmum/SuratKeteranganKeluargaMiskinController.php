<?php

namespace App\Http\Controllers\LandingPage\LayananUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\KepalaKeluarga;
use App\Models\DetailAnggotaKeluarga;
use App\Models\PermohonanAdministrasiWarga;
use App\Models\SuratKeteranganKeluargaMiskin;
use Auth;

class SuratKeteranganKeluargaMiskinController extends Controller
{
    public function index()
    {
        $desa           = Desa::find(1);
        $surat          = DaftarSurat::where('jenis_surat','publik')->get();
        $account        = Penduduk::with('user')->where('user_id', Auth::user()->id)->first();
        $checkStatusKlg = DetailAnggotaKeluarga::where('nik', $account->nik)->first();
        
        $kelompokKeluarga   = NULL;
        $kk                 = NULL;
        if(!empty($checkStatusKlg))
        {
            $kk = KepalaKeluarga::where('id',  $checkStatusKlg->id_kepala_keluarga)->first();
            $kelompokKeluarga = \DB::table('detail_anggota_keluargas')
                    ->where('detail_anggota_keluargas.id_kepala_keluarga', '=', $checkStatusKlg->id_kepala_keluarga)
                    ->join('penduduks', 'penduduks.nik', '=', 'detail_anggota_keluargas.nik')
                    ->join('sdhk', 'sdhk.id', '=', 'penduduks.id_sdhk')
                    ->where('penduduks.is_live', '=', true)
                    ->select(
                        'detail_anggota_keluargas.nik as nik_anggota',
                        'sdhk.keterangan as hubungan_keluarga',
                        'penduduks.nama_lengkap as nama_lengkap',
                        'penduduks.tempat_lahir as tempat_lahir',
                        'penduduks.tgl_lahir as tgl_lahir',
                        'penduduks.alamat as alamat',
                    )
                    ->get();
        }
        return view('landing-page.layanan_umum.surat_keterangan_keluarga_miskin.index', compact('desa','surat','account','checkStatusKlg','kelompokKeluarga','kk'));
    }

    public function checkNIK(Request $request)
    {
        $data       = Penduduk::where('nik', $request->check_nik)->first();
        abort_if(!$data, 400, 'NIK Tidak Terdaftar Sebagai Penduduk Desa Cimara!');
        if($request->has('reason')&& empty($request->input('reason')))
        {
            return response()->json([
                'error'     => true,
                'icon'      => 'error',
                'type'      => 'error',
                'message'   => 'NIK Tidak Terdaftar Sebagai Penduduk Desa Cimara !',
                'data'      => $data  
            ]);
        }

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'NIK Terdaftar Sebagai Penduduk Desa Cimara!'.' RT : '.$data->Rt->nomor.' RW :'.$data->Rt->rw,
            'data'      => $data  
        ]);
    }


    public function pengajuan(Request $request)
    {
        $error = [];
        $penduduk   = Penduduk::where('nik',$request->nik_pemohon)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');

        $keperluan   = Penduduk::where('nik',$request->nik_peruntukan)->first();
        abort_if(!$keperluan, 400, 'Penduduk Tidak Terdaftar');

        if(!$penduduk)
        {
            $error[] = $request->nik_pemohon." "."NIK PEMOHON TIDAK TERDAFTAR!!";
            return redirect()->route('lp.layanan-umum.surat-keterangan-penghasilan.index')->with('errorpengajuan',$error);
        }
        if(!$keperluan)
        {
            $error[] = $request->nik_peruntukan." "."NIK PERUNTUKAN TIDAK TERDAFTAR!!";
            return redirect()->route('lp.layanan-umum.surat-keterangan-penghasilan.index')->with('errorpengajuan',$error);
        }

        $lastRecord = SuratKeteranganKeluargaMiskin::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        $surat      = DaftarSurat::find(4);
        SuratKeteranganKeluargaMiskin::create([
            'nomor_surat'               => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat'             => $nextNomorUrut,
            'nik'                       => $penduduk->nik,
            'nama_pemohon'              => $penduduk->nama_lengkap,
            'jenis_kelamin'             => $penduduk->jenis_kelamin,
            'alamat'                    => $penduduk->alamat,
            'tempat_lahir'              => $penduduk->tempat_lahir,
            'tgl_lahir'                 => $penduduk->tgl_lahir,
            'warganegara'               => $request->warganegara??'INDONESIA',
            'nama_keperluan'            => $request->keperluan,
            'nik_keperluan'             => $keperluan->nik,
            'nama_orang_keperluan'      => $keperluan->nama_lengkap,
            'jenis_kelamin_keperluan'   => $keperluan->jenis_kelamin,
            'tempat_lahir_keperluan'    => $keperluan->tempat_lahir,
            'tgl_lahir_keperluan'       => $keperluan->tgl_lahir,
            'tgl_surat'                 => now(),
            'is_cetak'                  => false,
        ]);

        $lastRegisterCode = PermohonanAdministrasiWarga::orderBy('created_at', 'desc')->first();
        if ($lastRegisterCode) {
            $lastCode           = $lastRegisterCode->code_register;
            $nextNumber         = (int)substr($lastCode, -3) + 1; // Mengambil 3 digit terakhir dan menambahkan 1
            $nextRegisterCode   = 'SPm-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $nextRegisterCode   = 'SPm-001';
        }

        $slug = DaftarSurat::find(4);
        
        PermohonanAdministrasiWarga::create([
            'code_register'     => $nextRegisterCode,
            'nik'               => $penduduk->nik,
            'nama_pemohon'      => $penduduk->nama_lengkap,
            'jenis_surat'       => 'Surat Keterangan Keluarga Miskin',
            'url_slug'          => $slug->url,
            'tgl_permohonan'    => now(),
            'status'            => 'menunggu_proses',
            'nik_peruntukan'    => $keperluan->nik,
            'kontak'            => $request->kontak,
            'keterangan'        => $request->keperluan,
        ]);

        return redirect()->route('lp.warga.dashboard')->with('success', 'Yeay.... Data Berhasil DiKirim!');
    }
}
