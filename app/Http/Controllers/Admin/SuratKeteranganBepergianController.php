<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use App\Models\DaftarSurat;
use App\Models\SuratKeteranganBepergian;
use Carbon\Carbon;

class SuratKeteranganBepergianController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganBepergian::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $skb = $query->get();
        return view('admin.layanan_umum.sk_bepergian.index', compact('skb','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks  = Penduduk::active()->where('is_mutasi', false)->get();
        $province   = Province::all();
        return view('admin.layanan_umum.sk_bepergian.create', compact('penduduks','province'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'kepentingan'       => 'required',
            'province_id'       => 'required|integer',
            'regency_id'        => 'required|integer',
            'district_id'       => 'required|integer',
            'village_id'        => 'required|integer',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik.required'  => 'Nik penduduk harus dipilih!',
            'kepentingan.required'  => 'Kepentingan harus dipilih!',
            'province_id'       => 'Provinsi wajib dipilih',
            'regency_id'        => 'Kabupaten Kota wajib dipilih',
            'district_id'       => 'Kecamatan wajib dipilih',
            'village_id'        => 'Desa wajib dipilih',
        ]);

        $lastRecord = SuratKeteranganBepergian::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        $surat      = DaftarSurat::find(6);
        SuratKeteranganBepergian::create([
            'nomor_surat'   => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat' => $nextNomorUrut,
            'nik'           => $penduduk->nik,
            'kepentingan'   => strtoupper($request->kepentingan),
            'province_id'   => $request->province_id,
            'regency_id'    => $request->regency_id,
            'district_id'   => $request->district_id,
            'village_id'    => $request->village_id,
            'tgl_surat'     => $request->tgl_surat,
            'is_cetak'      => false,
        ]);

        return redirect()->route('app.admin.surat.skb.index')->withSuccess('Surat Keterangan Bepergian Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $skb        = SuratKeteranganBepergian::find($id);
        abort_if(!$skb, 400, 'Surat Keterangan Bepergian Tidak Terdaftar');
        
        $penduduks  = Penduduk::active()->where('is_mutasi', false)->get();
        $province   = Province::get();
        $regency    = Regency::where('province_id',$skb->province_id)->get();
        $district   = District::where('regency_id',$skb->regency_id)->get();
        $village    = Village::where('district_id',$skb->district_id)->get();
        return view('admin.layanan_umum.sk_bepergian.edit', compact('skb','penduduks','province','regency','district','village'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik'               => 'required',
            'kepentingan'       => 'required',
            'province_id'       => 'required|integer',
            'regency_id'        => 'required|integer',
            'district_id'       => 'required|integer',
            'village_id'        => 'required|integer',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik.required'  => 'Nik penduduk harus dipilih!',
            'kepentingan.required'  => 'Kepentingan harus dipilih!',
            'province_id'       => 'Provinsi wajib dipilih',
            'regency_id'        => 'Kabupaten Kota wajib dipilih',
            'district_id'       => 'Kecamatan wajib dipilih',
            'village_id'        => 'Desa wajib dipilih',
        ]);

        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi',false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        
        $skb        = SuratKeteranganBepergian::find($id);
        abort_if(!$skb, 400, 'Surat Keterangan Bepergian Tidak Terdaftar');
        $skb->nomor_surat   = $skb->nomor_surat;
        $skb->no_urut_surat = $skb->no_urut_surat;
        $skb->nik           = $penduduk->nik;
        $skb->kepentingan   = strtoupper($request->kepentingan);
        $skb->province_id   = $request->province_id;
        $skb->regency_id    = $request->regency_id;
        $skb->district_id   = $request->district_id;
        $skb->village_id    = $request->village_id;
        $skb->tgl_surat     = $request->tgl_surat;
        $skb->is_cetak      = false;
        $skb->save();

        return redirect()->route('app.admin.surat.skb.index')->withSuccess('Surat Keterangan Bepergian Berhasil di Perbaharui!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganBepergian::with('penduduk')->where('no_urut_surat', $request->no)->first();
        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $pekerjaan  = $data->penduduk->id_pekerjaan ==null?'Pekerjaan BELUM DIISI. Silahkan Update data penduduk!!':$data->penduduk->Pekerjaan->keterangan;
        $jk         = $data->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $tgl_lahir  = $data->penduduk->tempat_lahir.', '.Carbon::parse($data->penduduk->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        $kota       = 'DESA '.$data->village->name.' KECAMATAN '. $data->district->name.' '.$data->regency->name.' - '.$data->province->name;
        // dd($kota);
        return response()->json([
            'data'=>$data,
            'ttl'=>$tgl_lahir,
            'tgl_surat'=>$tgl_surat,
            'no_surat'=>$no_surat,
            'jk'=>$jk,
            'kota'=>$kota,
            'pekerjaan'=>$pekerjaan, 
        200]);
    }

    public function cetak($id)
    {
        $data       = SuratKeteranganBepergian::find($id);
        abort_if(!$data, 400, 'data Keterangan Bepergian tidak ditemukan!');
        $data->is_cetak = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Bepergian Sudah di Cetak!',
            'data'      => $data  
        ]);
    }
    public function batalCetak($id)
    {
        $data       = SuratKeteranganBepergian::find($id);
        abort_if(!$data, 400, 'data Keterangan Bepergian tidak ditemukan!');
        $data->is_cetak = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Surat Keterangan Bepergian berhasil dirubah kedalam status Belum Cetak!',
            'data'      => $data  
        ]);
    }
    public function getRegency(Request $request)
    {
        $data = Regency::where('province_id', $request->id)->get();
        return response()->json($data, 200);
    }
    public function getDistrict(Request $request)
    {
        $data = District::where('regency_id', $request->id)->get();
        return response()->json($data, 200);
    }
    public function getVillage(Request $request)
    {
        $data = Village::where('district_id', $request->id)->get();
        return response()->json($data, 200);
    }
    public function addResponse($id, Request $request)
    {
        $data       = SuratKeteranganBepergian::find($id);
        abort_if(!$data, 400, 'data Keterangan Bepergian tidak ditemukan!');
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
