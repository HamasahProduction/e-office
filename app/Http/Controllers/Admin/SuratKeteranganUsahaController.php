<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganUsaha;
use Carbon\Carbon;

class SuratKeteranganUsahaController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganUsaha::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $sk_usaha = $query->get();
        return view('admin.layanan_umum.sk_usaha.index', compact('sk_usaha','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_usaha.create_by_nik', compact('penduduks'));
    }

    public function storeByNIK(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'nama_usaha_bynik'  => 'required|max:255',
            'tgl_surat_bynik'   => 'required|date',
           
        ],[
            'nama_usaha_bynik.required'      => 'Nama usaha harus diisi!',
            'nama_usaha_bynik.max'           => 'Maksimal 255 karakter!',
        ]);

        $lastRecord = SuratKeteranganUsaha::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi', false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(1);
        SuratKeteranganUsaha::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nama_usaha'    => $request->nama_usaha_bynik,
            'nik'           => $penduduk->nik,
            'nama_pemohon'  => $penduduk->nama_lengkap,
            'jenis_kelamin' => $penduduk->jenis_kelamin,
            'pekerjaan'     => $penduduk->Pekerjaan->keterangan,
            'alamat'        => $penduduk->alamat,
            'tempat_lahir'  => $penduduk->tempat_lahir,
            'tgl_lahir'     => $penduduk->tgl_lahir,
            'tgl_surat'     => $request->tgl_surat_bynik,
            'is_cetak'      => false,
        ]);

        return redirect()->route('app.admin.surat.sku.index')->withSuccess('Surat Keteranan Usaha Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sku        = SuratKeteranganUsaha::find($id);
        $penduduks  = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_usaha.edit', compact('sku','penduduks'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nik'               => 'required',
            'nama_usaha_bynik'  => 'required|max:255',
            'tgl_surat_bynik'   => 'required|date',
           
        ],[
            'nama_usaha_bynik.required'      => 'Nama usaha harus diisi!',
            'nama_usaha_bynik.max'           => 'Maksimal 255 karakter!',
        ]);

        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi', false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');

        $sku        = SuratKeteranganUsaha::find($id);
        abort_if(!$penduduk, 400, 'Surat Keterangan Usaha Tidak Terdaftar');
        $sku->nomor_surat   = $sku->nomor_surat;
        $sku->no_urut_surat = $sku->no_urut_surat;
        $sku->nama_usaha    = $request->nama_usaha_bynik;
        $sku->nik           = $penduduk->nik;
        $sku->nama_pemohon  = $penduduk->nama_lengkap;
        $sku->jenis_kelamin = $penduduk->jenis_kelamin;
        $sku->pekerjaan     = $penduduk->Pekerjaan->keterangan;
        $sku->alamat        = $penduduk->alamat;
        $sku->tempat_lahir  = $penduduk->tempat_lahir;
        $sku->tgl_lahir     = $penduduk->tgl_lahir;
        $sku->tgl_surat     = $request->tgl_surat_bynik;
        $sku->is_cetak      = false;
        $sku->save();
        return redirect()->route('app.admin.surat.sku.index')->withSuccess('Surat Keteranan Usaha Berhasil Perbaharui!');

    }
    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganUsaha::where('no_urut_surat', $request->no)->first();
        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $jk         = $data->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->tempat_lahir.', '.Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        return response()->json(['data'=>$data,'ttl'=>$tgl_lahir,'tgl_surat'=>$tgl_surat,'no_surat'=>$no_surat,'jk'=>$jk, 200]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganUsaha::find($id);
        abort_if(!$data, 400, 'data SKU tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKU Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganUsaha::find($id);
        abort_if(!$data, 400, 'data SKU tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat SKU berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganUsaha::find($id);
        abort_if(!$data, 400, 'data SKU tidak ditemukan!');
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
            'message'   => 'Surat SKU berhasil diberikan respon untuk pemohon surat!',
            'data'      => $data  
        ]);
    }
}
