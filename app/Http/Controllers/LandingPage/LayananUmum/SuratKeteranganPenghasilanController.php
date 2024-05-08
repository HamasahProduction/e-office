<?php

namespace App\Http\Controllers\LandingPage\LayananUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\KepalaKeluarga;
use App\Models\SuratKeteranganPenghasilan;
use App\Models\PermohonanAdministrasiWarga;
use App\Models\DetailAnggotaKeluarga;
use Auth;

class SuratKeteranganPenghasilanController extends Controller
{
    public function index(Request $request)
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
        return view('landing-page.layanan_umum.surat_keterangan_penghasilan.index', compact('desa','surat','account','checkStatusKlg','kelompokKeluarga','kk'));
    }

    public function pengajuan(Request $request)
    {
        $error = [];
        $data           = Penduduk::where('nik', $request->nik_pemohon)->first();
        $kepalaKeluarga = Penduduk::where('nik', $request->nik_ortu)->first();
        if(!$data)
        {
            $error[] = $request->nik_pemohon." "."NIK PEMOHON TIDAK TERDAFTAR!!";
            return redirect()->route('lp.layanan-umum.surat-keterangan-penghasilan.index')->with('errorpengajuan',$error);
        }

        $lastRecord = SuratKeteranganPenghasilan::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        $surat      = DaftarSurat::find(5);
        SuratKeteranganPenghasilan::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik_ortu'      => $request->nik_ortu,
            'nik_anak'      => $data->nik,
         
            'penghasilan'   => $request->penghasilan,
            'note'          => $request->keterangan,
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

        $slug = DaftarSurat::find(5);

        PermohonanAdministrasiWarga::create([
            'code_register' => $nextRegisterCode,
            'nik'           => $data->nik,
            'nama_pemohon'  => $data->nama_lengkap,
            'jenis_surat'   => 'Surat Keterangan Penghasilan',
            'url_slug'      => $slug->url,
            'tgl_permohonan'=> now(),
            'status'        => 'menunggu_proses',
            'pekerjaan'     => $kepalaKeluarga->Pekerjaan->keterangan,
            'nik_orangtua'  => $request->nik_ortu,
            'kontak'        => $request->kontak,
            'penghasilan'   => $request->penghasilan,
        ]);

        return redirect()->route('lp.warga.dashboard')->with('success', 'Yeay.... Data Berhasil DiKirim!');
    }


}
