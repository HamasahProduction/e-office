<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganBedaNama;
use Carbon\Carbon;

class SuratKeteranganBedaNamaController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $surat      = DaftarSurat::find(12);
        $query      = SuratKeteranganBedaNama::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $skbn = $query->get();
        return view('admin.layanan_umum.sk_beda_nama.index', compact('skbn','surat','tgl_surat','request'));
    }

    public function create()
    {
        $penduduks          = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_beda_nama.create', compact('penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik_pemohon'       => 'required',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik_pemohon.required'  => 'Nik penduduk harus dipilih!',
            'tgl_surat'             => 'Tanggal harus dipilih',
        ]);

        $lastRecord = SuratKeteranganBedaNama::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik_pemohon)->where('is_mutasi', false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(7);
        SuratKeteranganBedaNama::create([
            'nomor_surat'           => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat'         => $nextNomorUrut,
            'nik'                   => $penduduk->nik,
            'dokumen_berbeda'       => $request->dokumen_berbeda,
            'perbedaan_nama'        => $request->perbedaan_nama,
            'dokumen_berbeda_lainya'=> implode(',', $request->dokumen_berbeda_lainya),
            'perbedaan_nama_lainya' => implode(',', $request->perbedaan_nama_lainya),
            'jumlah_berkas'         => count($request->perbedaan_nama_lainya)+ 1,
            'tgl_surat'             => $request->tgl_surat,
            'is_cetak'              => false,
        ]);

        return redirect()->route('app.admin.surat.skbn.index')->withSuccess('Surat Keterangan Beda Nama Berhasil ditambahkan!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganBedaNama::with('penduduk')->where('no_urut_surat', $request->no)->first();
        abort_if(!$data, 400, 'Surat Tidak Terdaftar');
        
        $pekerjaan  = $data->penduduk->Pekerjaan->keterangan;
        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $jk         = $data->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->penduduk->tempat_lahir.', '.Carbon::parse($data->penduduk->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        $alamat     = 'DESA '.$data->penduduk->village->name.' KECAMATAN '. $data->penduduk->district->name.' '.$data->penduduk->regency->name.' - '.$data->penduduk->province->name;
        
        $combinedData   = [];
        $keterangan     = explode(',', $data->dokumen_berbeda_lainya);
        $nama           = explode(',', $data->perbedaan_nama_lainya);
        $perbedaan      = $data->dokumen_berbeda.' dengan '.$data->dokumen_berbeda_lainya;

        foreach ($keterangan as $key => $item) {
            $combinedData[] = [
                'keterangan' => $item,
                'nama' => $nama[$key]
            ];
        }

        return response()->json(
            [
                'data' => $data,
                'ttl' => $tgl_lahir,
                'tgl_surat' => $tgl_surat,
                'no_surat' => $no_surat,
                'jk' => $jk,
                'pekerjaan' => $pekerjaan,
                'alamat' => $alamat,
                'keterangan' => $perbedaan,
                'beda_nama' => $nama,
                'combined_data' => $combinedData
            ],
            200
        );
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganBedaNama::find($id);
        abort_if(!$data, 400, 'data Keterangan Beda Nama tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Beda Nama Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganBedaNama::find($id);
        abort_if(!$data, 400, 'data Keterangan Beda Nama tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Beda Nama berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganBedaNama::find($id);
        abort_if(!$data, 400, 'data Keterangan Beda Nama tidak ditemukan!');
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
            'message'   => 'Surat Keterangan Beda Nama berhasil diberikan respon untuk pemohon surat!',
            'data'      => $data  
        ]);
    }
}
