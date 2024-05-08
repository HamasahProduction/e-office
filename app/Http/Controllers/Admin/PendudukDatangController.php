<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendudukPindahDatang;
use App\Models\StatusKKTidakPindah;
use App\Models\StatusKKYangPindah;
use App\Models\KlasifikasiPindah;
use App\Models\JenisKepindahan;
use App\Models\KepalaKeluarga;
use App\Models\AlasanPindah;
use App\Models\Penduduk;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class PendudukDatangController extends Controller
{
    public function index()
    {
        $pendudukPindahs = PendudukPindahDatang::all();
        return view('admin.penduduk.pindah_datang.data_penduduk_pindah_datang', compact('pendudukPindahs'));
    }
    public function create()
    {
        $JenisPindah            = JenisKepindahan::all();
        $KlasifikasiPindah      = KlasifikasiPindah::all();
        $StatusKKTidakPindah    = StatusKKTidakPindah::all();
        $StatusKKYangPindah     = StatusKKYangPindah::all();
        $AlasanPindah           = AlasanPindah::all();
        $province               = Province::all();
        $kepalaKeluarga         = KepalaKeluarga::all();
        $pemohon                = Penduduk::active()->get();
        return view('admin.penduduk.pindah_datang.penduduk_pindah_datang', compact('JenisPindah','KlasifikasiPindah','StatusKKTidakPindah','StatusKKYangPindah','AlasanPindah','province','kepalaKeluarga','pemohon'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'no_kk'                     => 'required|digits_between:16,16',
            // 'nama_kepala_keluarga'      => 'required|max:255',
            'dusun_asal'                => 'required|max:255',
            'rt_asal'                   => 'required|numeric|digits_between:3,3',
            'rw_asal'                   => 'required|numeric|digits_between:3,3',
            'no_hp'                     => 'required|digits_between:10,15',
            'kode_pos_asal'             => 'required|numeric|digits_between:5,5',
            'provinsi_asal'             => 'required',
            'kabupaten_asal'            => 'required',
            'kecamatan_asal'            => 'required',
            'desa_asal'                 => 'required',
            'rencana_tgl_pindah'        => 'required|date',
            'nama_pemohon'              => 'required|max:255',
            'nik_pemohon'               => 'required|numeric|digits_between:16,16',
            'alasan_pindah_id'          => 'required',
            'klasifikasi_pindah_id'     => 'required',
            'jenis_kepindahan_id'       => 'required',
            'status_kk_tdk_pindah_id'   => 'required',
            'status_kk_pindah_id'       => 'required',
            'dusun_tujuan'              => 'required|max:255',
            'rt_tujuan'                 => 'required|numeric|digits_between:3,3',
            'rw_tujuan'                 => 'required|numeric|digits_between:3,3',
            'provinsi_tujuan'           => 'required',
            'kabupaten_tujuan'          => 'required',
            'kecamatan_tujuan'          => 'required',
            'desa_tujuan'               => 'required|max:255',
            'kode_pos_tujuan'           => 'required|numeric|digits_between:5,5',
           
        ],[
            'nik_pemohon.required'      => 'Nik pemohon wajib diisi!',
            'nik_pemohon.min'           => 'Nik minimal 16 digits!',
            'nik_pemohon.max'           => 'Nik maksimal 16 digits!',
            // 'no_kk'                     => 'No KK wajib diisi!',
            // 'no_kk.min'                 => 'Minimal 16 digit!',
            // 'no_kk.max'                 => 'Maksimal 16 digit!',
            'nama_pemohon'              => 'Nama pemohon wajib diisi!',
            // 'nama_kepala_keluarga'      => 'Nama kepala keluarga wajib diisi!',
            'dusun_asal'                => 'Dusun asal wajib dipilih!',
            'rt_asal'                   => 'RT asal wajib dipilih!',
            'rt_asal.max'               => 'Maksimal 3 digits!',
            'rw_asal'                   => 'RW asal wajib dipilih!',
            'rw_asal.max'               => 'Maksimal 3 digits!',
            'dusun_tujuan'              => 'Dusun asal wajib dipilih!',
            'rt_tujuan'                 => 'RT asal wajib dipilih!',
            'rt_tujuan.max'             => 'Maksimal 3 digits!',
            'rw_tujuan'                 => 'RW asal wajib dipilih!',
            'rw_tujuan.max'             => 'Maksimal 3 digits!',
            'desa_asal'                 => 'Desa asal wajib dipilih!',
            'kecamatan_asal'            => 'Kecamatan asal wajib dipilih!',
            'kabupaten_asal'            => 'Kabupaten asal wajib dipilih!',
            'provinsi_asal'             => 'Provinsi asal wajib dipilih!',
            'kode_pos_asal'             => 'Kodepos wajib diisi!',
            'no_hp.min'                 => 'Minimal no hp 11 digit',
            'no_hp.max'                 => 'Maksimal no hp 13 digit',
            'alasan_pindah_id'          => 'Alasan Pindah wajib dipilih!',
            'desa_tujuan'               => 'Desa tujuan wajib dipilih!',
            'kecamatan_tujuan'          => 'Kecamatan tujuan wajib dipilih!',
            'kabupaten_tujuan'          => 'Kabupaten tujuan wajib dipilih!',
            'provinsi_tujuan'           => 'Provinsi tujuan wajib dipilih!',
            'kode_pos_tujuan'           => 'Kode pos wajib diisi!',
            'klasifikasi_pindah_id'     => 'Klasifikasi pindah wajib dipilih!',
            'jenis_kepindahan_id'       => 'Jenis kepindahan wajib dipilih!',
            'status_kk_tdk_pindah_id'   => 'Status KK tidak pindah wajib dipilih!',
            'status_kk_pindah_id'       => 'Status KK yang pindah wajib dipilih!',
            'rencana_tgl_pindah'        => 'Rencana tanggal pindah wajib dipilih!',
        ]);

        $kepalaKeluarga = KepalaKeluarga::find($request->kk_id); 
        abort_if(!$kepalaKeluarga, 400, 'Kepala Keluarga Tidak Terdaftar');
        
        $pemohon = Penduduk::find($request->penduduk_id); 
        abort_if(!$pemohon, 400, 'Data Pemohon Tidak Terdaftar Sebagai Penduduk');

        PendudukPindahDatang::create([
            'no_kk'                     => $kepalaKeluarga->no_kk,
            'nama_kepala_keluarga'      => $kepalaKeluarga->penduduk->nama_lengkap,
            'nik_pemohon'               => $pemohon->nik,
            'nama_pemohon'              => $pemohon->nama_lengkap,
            'dusun_asal'                => $request->dusun_asal,
            'rt_asal'                   => $request->rt_asal,
            'rw_asal'                   => $request->rw_asal,
            'desa_asal'                 => $request->desa_asal,
            'kecamatan_asal'            => $request->kecamatan_asal,
            'kabupaten_asal'            => $request->kabupaten_asal,
            'provinsi_asal'             => $request->provinsi_asal,
            'kode_pos_asal'             => $request->kode_pos_asal,
            'no_hp'                     => $request->no_hp,
            'alasan_pindah_id'          => $request->alasan_pindah_id,
            'dusun_tujuan'              => $request->dusun_tujuan,
            'rt_tujuan'                 => $request->rt_tujuan,
            'rw_tujuan'                 => $request->rw_tujuan,
            'desa_tujuan'               => $request->desa_tujuan,
            'kecamatan_tujuan'          => $request->kecamatan_tujuan,
            'kabupaten_tujuan'          => $request->kabupaten_tujuan,
            'provinsi_tujuan'           => $request->provinsi_tujuan,
            'kode_pos_tujuan'           => $request->kode_pos_tujuan,
            'klasifikasi_pindah_id'     => $request->klasifikasi_pindah_id,
            'jenis_kepindahan_id'       => $request->jenis_kepindahan_id,
            'status_kk_tdk_pindah_id'   => $request->status_kk_tdk_pindah_id,
            'status_kk_pindah_id'       => $request->status_kk_pindah_id,
            'rencana_tgl_pindah'        => $request->rencana_tgl_pindah,
            'status_surat'              =>'proses',
        ]);
        return redirect()->route('app.admin.penduduk-pindah-datang.index')->withSuccess('Penduduk Berhasil diperbaharui!');
    }

    public function detail($nik)
    {
        $pendudukPindah     = PendudukPindahDatang::where('nik_pemohon', $nik)->first();
        $nikArray           = str_split($pendudukPindah->nik_pemohon);
        $kkArray            = str_split($pendudukPindah->no_kk);
        $noHpArray          = str_split($pendudukPindah->no_hp);
        
        $rtAsalArray        = str_split($pendudukPindah->rt_asal);
        $rwAsalArray        = str_split($pendudukPindah->rw_asal);
        $kodePosAsalArray   = str_split($pendudukPindah->kode_pos_asal);
        
        $rtTujuanArray      = str_split($pendudukPindah->rt_tujuan);
        $rwTujuanArray      = str_split($pendudukPindah->rw_tujuan);
        $kodePosTujuanArray = str_split($pendudukPindah->kode_pos_tujuan);

        return view('admin.penduduk.pindah_datang.detail_penduduk_pindah_datang', compact('pendudukPindah','noHpArray','nikArray','kkArray','rtAsalArray','rwAsalArray','kodePosAsalArray','rtTujuanArray','rwTujuanArray'));
    }
    
    public function printData($nik)
    {
        $pendudukPindahs = PendudukPindahDatang::where('nik_pemohon', $nik)->first();
        return view('admin.penduduk.pindah_datang.template_surat.print_surat_pindah_datang', compact('pendudukPindahs'));
    }
}
