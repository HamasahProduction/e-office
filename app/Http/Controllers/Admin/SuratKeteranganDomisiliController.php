<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganDomisili;
use Carbon\Carbon;

class SuratKeteranganDomisiliController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganDomisili::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $skd = $query->get();
        return view('admin.layanan_umum.sk_domisili.index', compact('skd','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_domisili.create', compact('penduduks'));
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

        $lastRecord = SuratKeteranganDomisili::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(13);
        SuratKeteranganDomisili::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik'           => $penduduk->nik,
            'alamat'        => strtoupper($penduduk->alamat),
            'tgl_surat'     => $request->tgl_surat,
            'is_cetak'      => false,
        ]);

        return redirect()->route('app.admin.surat.skd.index')->withSuccess('Surat Keterangan Domisili Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $skd        = SuratKeteranganDomisili::find($id);
        abort_if(!$skd, 400, 'Surat Keterangan Domisili Tidak Terdaftar');
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_domisili.edit', compact('penduduks','skd'));
    }

    public function update(Request $request, $id)
    {

        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $skd        = SuratKeteranganDomisili::find($id);
        abort_if(!$skd, 400, 'Surat Keterangan Domisili Tidak Terdaftar');
        $skd->nomor_surat   = $skd->nomor_surat;
        $skd->no_urut_surat = $skd->no_urut_surat;
        $skd->nik           = $penduduk->nik;
        $skd->alamat        = strtoupper($penduduk->alamat);
        $skd->tgl_surat     = $request->tgl_surat;
        $skd->is_cetak      = false;
        $skd->save();

        return redirect()->route('app.admin.surat.skd.index')->withSuccess('Surat Keterangan Domisili Berhasil di Perbaharui!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganDomisili::with('penduduk')->where('no_urut_surat', $request->no)->first();
        abort_if(!$data, 400, 'Surat Tidak Terdaftar');
        
        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $jk         = $data->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->penduduk->tempat_lahir.', '.Carbon::parse($data->penduduk->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        $alamat     = 'DESA '.$data->penduduk->village->name.' KECAMATAN '. $data->penduduk->district->name.' '.$data->penduduk->regency->name.' - '.$data->penduduk->province->name;
        
        return response()->json(
            [
                'data'=>$data,
                'ttl'=>$tgl_lahir,
                'tgl_surat'=>$tgl_surat,
                'no_surat'=>$no_surat,
                'jk'=>$jk,
                'alamat'=>$alamat
                
            ,200]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganDomisili::find($id);
        abort_if(!$data, 400, 'data Keterangan Domisili tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Domisili Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganDomisili::find($id);
        abort_if(!$data, 400, 'data Keterangan Domisili tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Domisili berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganDomisili::find($id);
        abort_if(!$data, 400, 'data Keterangan Domisili tidak ditemukan!');
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
            'message'   => 'Surat Keterangan Domisili berhasil diberikan respon untuk pemohon surat!',
            'data'      => $data  
        ]);
    }
}
