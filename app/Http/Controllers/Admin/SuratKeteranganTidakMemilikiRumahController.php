<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganTidakMemilikiRumah;
use Carbon\Carbon;

class SuratKeteranganTidakMemilikiRumahController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganTidakMemilikiRumah::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $sktmr = $query->get();
        return view('admin.layanan_umum.sk_tidak_memiliki_rumah.index', compact('sktmr','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_tidak_memiliki_rumah.create', compact('penduduks'));
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

        $lastRecord = SuratKeteranganTidakMemilikiRumah::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(17);
        SuratKeteranganTidakMemilikiRumah::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik'           => $penduduk->nik,
            'tgl_surat'     => $request->tgl_surat,
            'is_cetak'      => false,
        ]);

        return redirect()->route('app.admin.surat.sktmr.index')->withSuccess('Surat Keterangan Tidak Memiliki Rumah Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sktmr      = SuratKeteranganTidakMemilikiRumah::find($id);
        abort_if(!$sktmr, 400, 'Surat Keterangan Tidak Memiliki Rumah Tidak Terdaftar');

        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_tidak_memiliki_rumah.edit', compact('penduduks','sktmr'));
    }

    public function update(Request $request, $id)
    {
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        
        $sktmr      = SuratKeteranganTidakMemilikiRumah::find($id);
        abort_if(!$sktmr, 400, 'Surat Keterangan Tidak Memiliki Rumah Tidak Terdaftar');

        $sktmr->nomor_surat   = $sktmr->nomor_surat;
        $sktmr->no_urut_surat = $sktmr->no_urut_surat;
        $sktmr->nik           = $penduduk->nik;
        $sktmr->tgl_surat     = $request->tgl_surat;
        $sktmr->is_cetak      = false;
        $sktmr->save();

        return redirect()->route('app.admin.surat.sktmr.index')->withSuccess('Surat Keterangan Tidak Memiliki Rumah Berhasil di Perbaharui!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganTidakMemilikiRumah::with('penduduk')->where('no_urut_surat', $request->no)->first();
        abort_if(!$data, 400, 'Surat Tidak Terdaftar');

        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $pekerjaan  = $data->penduduk->id_pekerjaan ==null?'Pekerjaan BELUM DIISI. Silahkan Update data penduduk!!':$data->penduduk->Pekerjaan->keterangan;
        $jk         = $data->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->penduduk->tempat_lahir.', '.Carbon::parse($data->penduduk->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        $warganegara = strtoupper($data->penduduk->kewarganegaraan=='WNI'?'Indonesia':'').' / '.strtoupper($data->penduduk->agama);
        return response()->json(
            [
                'data'=>$data,
                'ttl'=>$tgl_lahir,
                'tgl_surat'=>$tgl_surat,
                'no_surat'=>$no_surat,
                'jk'=>$jk,
                'warganegara'=>$warganegara,
                'pekerjaan'=>$pekerjaan
            ,200]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganTidakMemilikiRumah::find($id);
        abort_if(!$data, 400, 'data Keterangan Tidak Memiliki Rumah tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Tidak Memiliki Rumah Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganTidakMemilikiRumah::find($id);
        abort_if(!$data, 400, 'data Keterangan Tidak Memiliki Rumah tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Tidak Memiliki Rumah berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganTidakMemilikiRumah::find($id);
        abort_if(!$data, 400, 'Data Surat Keterangan Tidak Memiliki Rumah tidak ditemukan!');
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
