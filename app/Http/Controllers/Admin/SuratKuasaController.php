<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratKuasa;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use Carbon\Carbon;

class SuratKuasaController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKuasa::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $surat_kuasa = $query->get();
        return view('admin.layanan_umum.surat_kuasa.index', compact('tgl_surat','surat_kuasa'));
    }

    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.surat_kuasa.create', compact('penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ahli_waris'           => 'required|max:255',
            'nik_anggota_ahli_waris'    => 'required',
            'nik_penerima_kuasa'        => 'required',
            'keterangan'                => 'required',
            'tgl_surat'                 => 'required|date',
           
        ],[
            'nama_ahli_waris'           => 'Nama ahli waris wajib diisi!!',
            'nik_anggota_ahli_waris'    => 'Nik anggota ahli waris wajib dipilih!!',
            'nik_penerima_kuasa'        => 'Nik penerima kuasa wajib dipilih!!',
            'keterangan'                => 'Keterangan atau tujuan surat wajib diisi!!',
            'tgl_surat'                 => 'required|date',
        ]);

        $ahliWaris      = Penduduk::where('nik',$request->nik_anggota_ahli_waris)->where('is_mutasi', false)->first();
        abort_if(!$ahliWaris, 400, 'Penduduk Tidak Terdaftar');
        
        $penerimaKuasa   = Penduduk::where('nik',$request->nik_penerima_kuasa)->where('is_mutasi', false)->first();
        abort_if(!$penerimaKuasa, 400, 'Penduduk Tidak Terdaftar');

        SuratKuasa::create([
            'nama_ahli_waris'           => $request->nama_ahli_waris,
            'nik_anggota_ahli_waris'    => $request->nik_anggota_ahli_waris,
            'nik_penerima_kuasa'        => $request->nik_penerima_kuasa,
            'keterangan'                => $request->keterangan,
            'tgl_surat'                 => $request->tgl_surat,
            'is_cetak'                  => false,
        ]);
        return redirect()->route('app.admin.surat-kuasa.index')->withSuccess('Surat Kuasa Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $surat      = SuratKuasa::find($id);
        $penduduks  = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.surat_kuasa.edit', compact('surat','penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ahli_waris'           => 'required|max:255',
            'nik_anggota_ahli_waris'    => 'required',
            'nik_penerima_kuasa'        => 'required',
            'keterangan'                => 'required',
            'tgl_surat'                 => 'required|date',
           
        ],[
            'nama_ahli_waris'           => 'Nama ahli waris wajib diisi!!',
            'nik_anggota_ahli_waris'    => 'Nik anggota ahli waris wajib dipilih!!',
            'nik_penerima_kuasa'        => 'Nik penerima kuasa wajib dipilih!!',
            'keterangan'                => 'Keterangan atau tujuan surat wajib diisi!!',
            'tgl_surat'                 => 'required|date',
        ]);

        $ahliWaris      = Penduduk::where('nik',$request->nik_anggota_ahli_waris)->where('is_mutasi',false)->first();
        abort_if(!$ahliWaris, 400, 'Penduduk Tidak Terdaftar');
        
        $penerimaKuasa   = Penduduk::where('nik',$request->nik_penerima_kuasa)->where('is_mutasi', false)->first();
        abort_if(!$penerimaKuasa, 400, 'Penduduk Tidak Terdaftar');

        $surat = SuratKuasa::find($id);
        $surat->nama_ahli_waris           = $request->nama_ahli_waris;
        $surat->nik_anggota_ahli_waris    = $request->nik_anggota_ahli_waris;
        $surat->nik_penerima_kuasa        = $request->nik_penerima_kuasa;
        $surat->keterangan                = $request->keterangan;
        $surat->tgl_surat                 = $request->tgl_surat;
        $surat->is_cetak                  = false;
        $surat->save();
        return redirect()->route('app.admin.surat-kuasa.index')->withSuccess('Surat Kuasa Berhasil Edit!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        // ahli waris
        $data           = SuratKuasa::find($request->id);
        $ahli_waris     = $data->ahliWaris->nama_lengkap;
        $pekerjaan_ahli = $data->ahliWaris->Pekerjaan->keterangan;
        $alamat_ahli    = 'DESA '.$data->ahliWaris->village->name.' KECAMATAN '. $data->ahliWaris->district->name.' '.$data->ahliWaris->regency->name.' - '.$data->ahliWaris->province->name;
        $umur_ahli      = Carbon::parse($data->ahliWaris->tgl_lahir)->diffInYears(Carbon::now()).' Tahun';
        // penerima kuasa
        $penerima_kuasa     = $data->penerimaKuasa->nama_lengkap;
        $pekerjaan_penerima = $data->penerimaKuasa->Pekerjaan->keterangan;
        $alamat_penerima    = 'DESA '.$data->penerimaKuasa->village->name.' KECAMATAN '. $data->penerimaKuasa->district->name.' '.$data->penerimaKuasa->regency->name.' - '.$data->penerimaKuasa->province->name;
        $umur_penerima      = Carbon::parse($data->penerimaKuasa->tgl_lahir)->diffInYears(Carbon::now()).' Tahun';
        
        $tgl_surat          = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        
        return response()->json([
            'data'=>$data,
            'ahli_waris'=>$ahli_waris,
            'alamat_ahli'=>$alamat_ahli,
            'pekerjaan_ahli'=>$pekerjaan_ahli,
            'umur_ahli'=>$umur_ahli,
            
            'penerima_kuasa'=>$penerima_kuasa,
            'alamat_penerima'=>$alamat_penerima,
            'pekerjaan_penerima'=>$pekerjaan_penerima,
            'umur_penerima'=>$umur_penerima,
            'tgl_surat'=>$tgl_surat,
            200]);
    }

    public function remove($id)
    {
        $surat = SuratKuasa::find($id);
        abort_if(!$surat, 400, 'Surat Kuasa Tidak Terdaftar');

        $surat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Surat Kuasa Berhasil Dihapus!.',
        ]); 
    }

    
}
