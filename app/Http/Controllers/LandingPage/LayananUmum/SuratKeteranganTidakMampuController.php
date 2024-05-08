<?php

namespace App\Http\Controllers\LandingPage\LayananUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\DaftarSurat;
use App\Models\SuratKeteranganTidakMampu;
use App\Models\PermohonanAdministrasiWarga;
use Carbon;
use Auth;

class SuratKeteranganTidakMampuController extends Controller
{
    public function index()
    {
        $desa       = Desa::find(1);
        $surat      = DaftarSurat::where('jenis_surat','publik')->get();
        $account    = Penduduk::with('user')->where('user_id', Auth::user()->id)->first();
        return view('landing-page.layanan_umum.surat_keterangan_tidak_mampu.index', compact('desa','surat','account'));
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
        $data       = Penduduk::where('nik', $request->nik)->first();
        if(!$data)
        {
            $error[] = $request->nik." "."NIK PEMOHON TIDAK TERDAFTAR!!";
            return redirect()->route('lp.layanan-umum.surat-keterangan-belum-memiliki-rumah.index')->with('errorpengajuan',$error);
        }

        $lastRecord = SuratKeteranganTidakMampu::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        $surat      = DaftarSurat::find(3);
        SuratKeteranganTidakMampu::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik'           => $data->nik,
            'nama_pemohon'  => $data->nama_lengkap,
            'jenis_kelamin' => $data->jenis_kelamin,
            'nama_sekolah'  => $request->nama_sekolah,
            'kelas'         => $request->kelas,
            'alamat'        => $data->alamat,
            'tempat_lahir'  => $data->tempat_lahir,
            'tgl_lahir'     => $data->tgl_lahir,
            'tgl_surat'     => now(),
            'is_cetak'      => false,
        ]);

        $lastRegisterCode = PermohonanAdministrasiWarga::orderBy('created_at', 'desc')->first();
        if ($lastRegisterCode) {
            $lastCode           = $lastRegisterCode->code_register;
            $nextNumber         = (int)substr($lastCode, -3) + 1; // Mengambil 3 digit terakhir dan menambahkan 1
            $nextRegisterCode   = 'SPm-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $nextRegisterCode   = 'SPm-001';
        }

        $slug      = DaftarSurat::find(3);
        
        PermohonanAdministrasiWarga::create([
            'code_register' => $nextRegisterCode,
            'nik'           => $data->nik,
            'nama_pemohon'  => $data->nama_lengkap,
            'jenis_surat'   => 'Surat Keterangan Tidak Mampu',
            'url_slug'      => $slug->url,
            'tgl_permohonan'=> now(),
            'status'        => 'menunggu_proses',
            'nama_sekolah'  => $request->nama_sekolah,
            'kelas'         => $request->kelas,
            'kontak'        => $request->kontak,
        ]);
        return redirect()->route('lp.warga.dashboard')->with('success', 'Yeay.... Data Berhasil DiKirim!');
    }

}
