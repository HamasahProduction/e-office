<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\KepalaKeluarga;
use App\Models\DetailAnggotaKeluarga;
use App\Models\SuratKeteranganPenghasilan;


class SuratKeteranganPenghasilanController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganPenghasilan::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $skp = $query->get();
        return view('admin.layanan_umum.sk_penghasilan_orangtua.index', compact('skp','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = KepalaKeluarga::get();
        return view('admin.layanan_umum.sk_penghasilan_orangtua.create', compact('penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kk_id'             => 'required',
            'nik_anak'          => 'required',
            'penghasilan'       => 'required|max:255',
            'note'              => 'required|max:255',
            'tgl_surat'         => 'required|date',
           
        ],[
            'kk_id.required'        => 'Kepala keluarga harus dipilih!',
            'nik_anak.required'     => 'Anggota keluarga harus dipilih!',
            'penghasilan.required'  => 'Penghasilan harus diisi!',
            'note.required'         => 'Keperluan harus diisi!',
        ]);

        $lastRecord = SuratKeteranganPenghasilan::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $kk   = Penduduk::where('nik',$request->kk_id)->where('is_mutasi', false)->first();
        abort_if(!$kk, 400, 'Penduduk Tidak Terdaftar');

        $anak   = Penduduk::where('nik',$request->nik_anak)->where('is_mutasi', false)->first();
        abort_if(!$anak, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(5);
        SuratKeteranganPenghasilan::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik_ortu'      => $kk->nik,
            'nik_anak'      => $anak->nik,
         
            'penghasilan'   => $request->penghasilan,
            'note'          => $request->note,
            'tgl_surat'     => $request->tgl_surat,
            'is_cetak'      => false,
        ]);

        return redirect()->route('app.admin.surat.skp.index')->withSuccess('Surat Keterangan Penghasilan Berhasil ditambahkan!');
    }

    public function getKK(Request $request)
    {
        $kkId = $request->input('kk_id');
        if(empty($kkId))
        {
            $penghasilanOrtu = [];
            return response()->json([
                'data' => $penghasilanOrtu ,
            ]);
        }
        $kk = KepalaKeluarga::where('nik', $kkId)->first();
        $penghasilanOrtu = \DB::table('detail_anggota_keluargas')
            ->where('detail_anggota_keluargas.id_kepala_keluarga', '=', $kk->id)
            ->join('penduduks', 'penduduks.nik', '=', 'detail_anggota_keluargas.nik')
            ->join('sdhk', 'sdhk.id', '=', 'penduduks.id_sdhk')
            ->where('penduduks.is_live', '=', true)
            ->where('detail_anggota_keluargas.is_mutasi', '=', false)
            ->select(
                'detail_anggota_keluargas.nik as nik_anggota',
                'sdhk.keterangan as hubungan_keluarga',
                'penduduks.nama_lengkap as nama_lengkap',
                'penduduks.tempat_lahir as tempat_lahir',
                'penduduks.tgl_lahir as tgl_lahir',
                'penduduks.alamat as alamat',
            )
            ->get();
        return response()->json([
            'data' => $penghasilanOrtu,
        ]);
    }
    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganPenghasilan::with(['orangTua','anak'])->where('no_urut_surat', $request->no)->first();
        
        $orangTua = \DB::table('kepala_keluargas')
            ->where('kepala_keluargas.nik', '=', $data->nik_ortu)
            ->join('penduduks', 'penduduks.nik', '=', 'kepala_keluargas.nik')
            ->join('sdhk', 'sdhk.id', '=', 'penduduks.id_sdhk')
            ->join('pekerjaan', 'pekerjaan.id', '=', 'penduduks.id_pekerjaan')
            ->join('status_perkawinan', 'status_perkawinan.id', '=', 'penduduks.id_status_perkawinan')
            ->where('penduduks.is_live', '=', true)
            ->select(
                'kepala_keluargas.nik as nik_ortu',
                'sdhk.keterangan as hubungan_keluarga',
                'penduduks.nama_lengkap as nama_lengkap',
                'penduduks.tempat_lahir as tempat_lahir',
                'penduduks.agama as agama',
                'penduduks.jenis_kelamin as jenis_kelamin',
                'penduduks.tgl_lahir as tgl_lahir',
                'penduduks.alamat as alamat',
                'status_perkawinan.keterangan as status_pernikahan',
                'pekerjaan.keterangan as pekerjaan',
            )
            ->first();
        $anak = \DB::table('detail_anggota_keluargas')
            ->where('detail_anggota_keluargas.nik', '=', $data->nik_anak)
            ->join('penduduks', 'penduduks.nik', '=', 'detail_anggota_keluargas.nik')
            ->join('sdhk', 'sdhk.id', '=', 'penduduks.id_sdhk')
            ->where('penduduks.is_live', '=', true)
            ->select(
                'detail_anggota_keluargas.nik as nik_anak',
                'sdhk.keterangan as hubungan_keluarga',
                'penduduks.nama_lengkap as nama_lengkap',
                'penduduks.tempat_lahir as tempat_lahir_anak',
                'penduduks.agama as agama',
                'penduduks.jenis_kelamin as jk_anak',
                'penduduks.tgl_lahir as tgl_lahir_anak',
                'penduduks.alamat as alamat',
            )
            ->first();
        $no_surat       = 'Nomor : '.$data->nomor_surat;
        $ttl_ortu       = $orangTua->tempat_lahir.', '.Carbon::parse($orangTua->tgl_lahir)->isoFormat('D MMMM Y');
        $jk_ortu        = $orangTua->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $jk_anak        = $anak->jk_anak=='L'?'Laki-Laki':'Perempuan';
        $ttl_anak       = $anak->tempat_lahir_anak.', '.Carbon::parse($anak->tgl_lahir_anak)->isoFormat('D MMMM Y');
        $tgl_surat      = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        return response()->json(
            [
            'no_surat'  => $no_surat,
            'tgl_surat' => $tgl_surat,
            'data'      => $data,
            'anak'      => $anak,
            'orangTua'  => $orangTua,
            'jk_ortu'   => $jk_ortu,
            'jk_anak'   => $jk_anak,
            'ttl_ortu'  => $ttl_ortu,
            'ttl_anak'  => $ttl_anak, 
            200
        ]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganPenghasilan::find($id);
        abort_if(!$data, 400, 'data SKP tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKP Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganPenghasilan::find($id);
        abort_if(!$data, 400, 'data SKP tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKP berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganPenghasilan::find($id);
        abort_if(!$data, 400, 'data SKP tidak ditemukan!');
        if($request->has('reason')&& empty($request->input('reason')))
        {
            return response()->json([
                'error'     => true,
                'icon'      => 'error',
                'type'      => 'error',
                'message'   => 'Keterangan Response Wajib Diisi !',
                'data'      => $data  
            ]);
        }
        $data->note_response = $request->reason;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Surat Keterangan berhasil diberikan respon untuk pemohon surat!',
            'data'      => $data  
        ]);
    }
}
