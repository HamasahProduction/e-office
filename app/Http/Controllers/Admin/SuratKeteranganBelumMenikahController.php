<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganBelumMenikah;
use Carbon\Carbon;

class SuratKeteranganBelumMenikahController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganBelumMenikah::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $skbm = $query->get();
        return view('admin.layanan_umum.sk_belum_menikah.index', compact('skbm','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_belum_menikah.create', compact('penduduks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik.required'      => 'Nik penduduk harus dipilih!',
            'tgl_surat'         => 'Tanggal harus dipilih',
        ]);

        $lastRecord = SuratKeteranganBelumMenikah::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(16);

        SuratKeteranganBelumMenikah::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik'           => $penduduk->nik,
            'tgl_surat'     => $request->tgl_surat,
            'is_cetak'      => false,
        ]);

        return redirect()->route('app.admin.surat.skbm.index')->withSuccess('Surat Keterangan Belum Menikah Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $skbm       = SuratKeteranganBelumMenikah::find($id);
        abort_if(!$skbm, 400, 'Surat Keterangan Belum Menikah Tidak Terdaftar');

        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_belum_menikah.edit', compact('penduduks','skbm'));
    }

    public function update(Request $request, $id)
    {

        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');

        $skbm       = SuratKeteranganBelumMenikah::find($id);
        abort_if(!$skbm, 400, 'Surat Keterangan Belum Menikah Tidak Terdaftar');

        $skbm->nomor_surat   = $skbm->nomor_surat;
        $skbm->no_urut_surat = $skbm->no_urut_surat;
        $skbm->nik           = $penduduk->nik;
        $skbm->tgl_surat     = $request->tgl_surat;
        $skbm->is_cetak      = false;
        $skbm->save();

        return redirect()->route('app.admin.surat.skbm.index')->withSuccess('Surat Keterangan Belum Menikah Berhasil di Perbaharui!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganBelumMenikah::with('penduduk')->where('no_urut_surat', $request->no)->first();
        abort_if(!$data, 400, 'Surat Tidak Terdaftar');

        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $jk         = $data->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->penduduk->tempat_lahir.', '.Carbon::parse($data->penduduk->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
     
        return response()->json(
            [
                'data'=>$data,
                'ttl'=>$tgl_lahir,
                'tgl_surat'=>$tgl_surat,
                'no_surat'=>$no_surat,
                'jk'=>$jk
            ,200]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganBelumMenikah::find($id);
        abort_if(!$data, 400, 'data Keterangan Belum Menikah tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Belum Menikah Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganBelumMenikah::find($id);
        abort_if(!$data, 400, 'data Keterangan Belum Menikah tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Belum Menikah berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganBelumMenikah::find($id);
        abort_if(!$data, 400, 'data Keterangan Belum Menikah tidak ditemukan!');
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
