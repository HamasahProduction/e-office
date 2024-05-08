<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganKeluargaMiskin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuratKeteranganKeluargaMiskinController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganKeluargaMiskin::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $skkm = $query->get();
        return view('admin.layanan_umum.sk_keluarga_miskin.index', compact('skkm','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_keluarga_miskin.create', compact('penduduks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'nama_keperluan'    => 'required|max:255',
            'warganegara'       => 'required|max:255',
            'nik_keperluan'     => 'required',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nama_keperluan.required'  => 'Nama Keperluan harus diisi!',
            'warganegara.required'     => 'Warganegara harus diisi!',
        ]);

        $lastRecord = SuratKeteranganKeluargaMiskin::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi', false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');

        $keperluan  = Penduduk::where('nik',$request->nik_keperluan)->where('is_mutasi', false)->first();
        abort_if(!$keperluan, 400, 'Penduduk Tidak Terdaftar');
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
            'warganegara'               => $request->warganegara,
            'nama_keperluan'            => $request->nama_keperluan,
            'nik_keperluan'             => $keperluan->nik,
            'nama_orang_keperluan'      => $keperluan->nama_lengkap,
            'jenis_kelamin_keperluan'   => $keperluan->jenis_kelamin,
            'tempat_lahir_keperluan'    => $keperluan->tempat_lahir,
            'tgl_lahir_keperluan'       => $keperluan->tgl_lahir,
            'tgl_surat'                 => $request->tgl_surat,
            'is_cetak'                  => false,
        ]);

        return redirect()->route('app.admin.surat.skkm.index')->withSuccess('Surat Keterangan Keluarga Miskin Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penduduks  = Penduduk::active()->where('is_mutasi', false)->get();
        $skkm       = SuratKeteranganKeluargaMiskin::find($id);
        return view('admin.layanan_umum.sk_keluarga_miskin.edit', compact('penduduks','skkm'));
    }

    public function update(Request $request, $id)
    {

        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi', false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        
        $keperluan  = Penduduk::where('nik',$request->nik_keperluan)->where('is_mutasi', false)->first();
        abort_if(!$keperluan, 400, 'Penduduk Tidak Terdaftar');

        $skkm       = SuratKeteranganKeluargaMiskin::find($id);
        abort_if(!$skkm, 400, 'Surat Keterangan Keluarga Miskin Tidak Terdaftar');

        $skkm->nomor_surat               = $skkm->nomor_surat;
        $skkm->no_urut_surat             = $skkm->no_urut_surat;
        $skkm->nik                       = $penduduk->nik;
        $skkm->nama_pemohon              = $penduduk->nama_lengkap;
        $skkm->jenis_kelamin             = $penduduk->jenis_kelamin;
        $skkm->alamat                    = $penduduk->alamat;
        $skkm->tempat_lahir              = $penduduk->tempat_lahir;
        $skkm->tgl_lahir                 = $penduduk->tgl_lahir;
        $skkm->warganegara               = $request->warganegara;
        $skkm->nama_keperluan            = $request->nama_keperluan;
        $skkm->nik_keperluan             = $keperluan->nik;
        $skkm->nama_orang_keperluan      = $keperluan->nama_lengkap;
        $skkm->jenis_kelamin_keperluan   = $keperluan->jenis_kelamin;
        $skkm->tempat_lahir_keperluan    = $keperluan->tempat_lahir;
        $skkm->tgl_lahir_keperluan       = $keperluan->tgl_lahir;
        $skkm->tgl_surat                 = $request->tgl_surat;
        $skkm->is_cetak                  = false;
        $skkm->save();

        return redirect()->route('app.admin.surat.skkm.index')->withSuccess('Surat Keterangan Keluarga Miskin Berhasil di Perbaharui!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data           = SuratKeteranganKeluargaMiskin::where('no_urut_surat', $request->no)->first();
        abort_if(!$data, 400, 'Surat Keterangan Keluarga Miskin Tidak Terdaftar');

        $no_surat       = 'Nomor : '.$data->nomor_surat;
        $jk             = $data->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $jk_keperluan   = $data->jenis_kelamin_keperluan=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir      = $data->tempat_lahir.', '.Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM Y');
        $ttl_keperluan  = $data->tempat_lahir.', '.Carbon::parse($data->tgl_lahir_keperluan)->isoFormat('D MMMM Y');
        $tgl_surat      = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        
        return response()->json([
            'data'=>$data,
            'ttl'=>$tgl_lahir,
            'tgl_surat'=>$tgl_surat,
            'no_surat'=>$no_surat,
            'jk'=>$jk,
            'jk_keperluan'=>$jk_keperluan,
            'ttl_keperluan'=>$ttl_keperluan,
        200]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganKeluargaMiskin::find($id);
        abort_if(!$data, 400, 'data SKKM tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKKM Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganKeluargaMiskin::find($id);
        abort_if(!$data, 400, 'data SKKM tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKKM berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganKeluargaMiskin::find($id);
        abort_if(!$data, 400, 'data SKKM tidak ditemukan!');
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
