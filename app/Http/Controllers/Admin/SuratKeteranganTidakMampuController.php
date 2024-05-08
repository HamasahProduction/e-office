<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganTidakMampu;
use Carbon\Carbon;

class SuratKeteranganTidakMampuController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganTidakMampu::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $sktm = $query->get();
        return view('admin.layanan_umum.sk_tidak_mampu_sekolah.index', compact('sktm','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_tidak_mampu_sekolah.create', compact('penduduks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik'           => 'required',
            'nama_sekolah'  => 'required|max:255',
            'kelas'         => 'required|max:255',
            'tgl_surat'     => 'required|date',
           
        ],[
            'nama_sekolah.required'     => 'Nama sekolah harus diisi!',
            'kelas.required'            => 'Kelas harus diisi!',
        ]);

        $lastRecord = SuratKeteranganTidakMampu::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(3);
        SuratKeteranganTidakMampu::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik'           => $penduduk->nik,
            'nama_pemohon'  => $penduduk->nama_lengkap,
            'jenis_kelamin' => $penduduk->jenis_kelamin,
            'nama_sekolah'  => $request->nama_sekolah,
            'kelas'         => $request->kelas,
            'alamat'        => $penduduk->alamat,
            'tempat_lahir'  => $penduduk->tempat_lahir,
            'tgl_lahir'     => $penduduk->tgl_lahir,
            'tgl_surat'     => $request->tgl_surat,
            'is_cetak'      => false,
        ]);

        return redirect()->route('app.admin.surat.sktm.index')->withSuccess('Surat Keteranan Tidak Mampu Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penduduks  = Penduduk::active()->where('is_mutasi', false)->get();
        $sktm       = SuratKeteranganTidakMampu::find($id);
        return view('admin.layanan_umum.sk_tidak_mampu_sekolah.edit', compact('penduduks','sktm'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik'           => 'required',
            'nama_sekolah'  => 'required|max:255',
            'kelas'         => 'required|max:255',
            'tgl_surat'     => 'required|date',
           
        ],[
            'nama_sekolah.required'     => 'Nama sekolah harus diisi!',
            'kelas.required'            => 'Kelas harus diisi!',
        ]);

        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        
        $sktm = SuratKeteranganTidakMampu::find($id);
        abort_if(!$sktm, 400, 'Surat Keterangan Tidak Mampu Tidak Terdaftar');
    
        $sktm->nomor_surat   = $sktm->nomor_surat;
        $sktm->no_urut_surat = $sktm->no_urut_surat;
        $sktm->nik           = $penduduk->nik;
        $sktm->nama_pemohon  = $penduduk->nama_lengkap;
        $sktm->jenis_kelamin = $penduduk->jenis_kelamin;
        $sktm->nama_sekolah  = $request->nama_sekolah;
        $sktm->kelas         = $request->kelas;
        $sktm->alamat        = $penduduk->alamat;
        $sktm->tempat_lahir  = $penduduk->tempat_lahir;
        $sktm->tgl_lahir     = $penduduk->tgl_lahir;
        $sktm->tgl_surat     = $request->tgl_surat;
        $sktm->is_cetak      = false;
        $sktm->save();
        return redirect()->route('app.admin.surat.sktm.index')->withSuccess('Surat Keteranan Tidak Mampu Berhasil di Perharui!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganTidakMampu::where('no_urut_surat', $request->no)->first();

        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $jk         = $data->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->tempat_lahir.', '.Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        return response()->json(['data'=>$data,'ttl'=>$tgl_lahir,'tgl_surat'=>$tgl_surat,'no_surat'=>$no_surat,'jk'=>$jk, 200]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganTidakMampu::find($id);
        abort_if(!$data, 400, 'data SKTM tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKTM Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganTidakMampu::find($id);
        abort_if(!$data, 400, 'data SKTM tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKTM berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganTidakMampu::find($id);
        abort_if(!$data, 400, 'data SKTM tidak ditemukan!');
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
