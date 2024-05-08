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

class SuratKeteranganPindahDatangController extends Controller
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
}
