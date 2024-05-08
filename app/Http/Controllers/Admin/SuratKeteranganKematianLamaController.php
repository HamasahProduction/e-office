<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKematianLama;
use App\Models\RT;
use Carbon\Carbon;

class SuratKeteranganKematianLamaController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKematianLama::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $sk_kematian_lama = $query->get();
        return view('admin.layanan_umum.sk_kematian_lama.index', compact('sk_kematian_lama','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_kematian_lama.create', compact('penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'hari_meninggal'    => 'required|max:255',
            'lokasi_meninggal'  => 'required|max:255',
            'penyebab_meninggal'=> 'required|max:255',
            'tgl_meninggal'     => 'required|date',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik'               => 'Nik wajib dipilih!!',
            'hari_meninggal'    => 'Hari Meninggal wajib diisi!!',
            'lokasi_meninggal'  => 'Lokasi Meninggal wajib diisi!!',
            'penyebab_meninggal'=> 'Penyebab Meninggal wajib diisi!!',
            'tgl_meninggal'     => 'Tanggal Meninggal wajib dipilih',
            'tgl_surat'         => 'Tanggal Surat wajib dipilih',
        ]);

        $lastRecord = SuratKematianLama::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        
        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi', false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');

        $birthDate   = Carbon::createFromFormat('Y-m-d', $penduduk->tgl_lahir);
        $currentDate = Carbon::now();
        $age = $currentDate->diffInYears($birthDate);

        $surat       = DaftarSurat::find(18);
        SuratKematianLama::create([
            'nik'               => $penduduk->nik,
            'nama'              => $penduduk->nama_lengkap,
            'umur'              => $age,
            'hari_meninggal'    => $request->hari_meninggal,
            'tgl_meninggal'     => $request->tgl_meninggal,
            'lokasi_meninggal'  => $request->lokasi_meninggal,
            'penyebab_meninggal'=> $request->penyebab_meninggal,
            
            'nomor_surat'       => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat'     => $nextNomorUrut,
            'tgl_surat'         => $request->tgl_surat,
            'is_cetak'          => false,
        ]);

        return redirect()->route('app.admin.surat-keterangan-kematian-lama.index')->withSuccess('Surat Kematian Lama Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sk_kematian = SuratKematianLama::find($id);
        abort_if(!$sk_kematian, 400, 'Surat Kematian Tidak Terdaftar');
        
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();

        return view('admin.layanan_umum.sk_kematian_lama.edit', compact('penduduks','sk_kematian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik'               => 'required',
            'hari_meninggal'    => 'required|max:255',
            'lokasi_meninggal'  => 'required|max:255',
            'penyebab_meninggal'=> 'required|max:255',
            'tgl_meninggal'     => 'required|date',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik'               => 'Nik wajib dipilih!!',
            'hari_meninggal'    => 'Hari Meninggal wajib diisi!!',
            'lokasi_meninggal'  => 'Lokasi Meninggal wajib diisi!!',
            'penyebab_meninggal'=> 'Penyebab Meninggal wajib diisi!!',
            'tgl_meninggal'     => 'Tanggal Meninggal wajib dipilih',
            'tgl_surat'         => 'Tanggal Surat wajib dipilih',
        ]);

        $penduduk   = Penduduk::where('nik',$request->nik)->where('is_mutasi', false)->first();
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');
        
        $birthDate   = Carbon::createFromFormat('Y-m-d', $penduduk->tgl_lahir);
        $currentDate = Carbon::now();
        $age = $currentDate->diffInYears($birthDate);
        
        $sk_kematian = SuratKematianLama::find($id);
        abort_if(!$sk_kematian, 400, 'Surat Kematian Tidak Terdaftar');

        $sk_kematian->nomor_surat       = $sk_kematian->nomor_surat;
        $sk_kematian->no_urut_surat     = $sk_kematian->no_urut_surat;
        $sk_kematian->tgl_surat         = $request->tgl_surat;
        $sk_kematian->nik               = $penduduk->nik;
        $sk_kematian->nama              = $penduduk->nama_lengkap;
        $sk_kematian->umur              = $age;
        $sk_kematian->hari_meninggal    = $request->hari_meninggal;
        $sk_kematian->tgl_meninggal     = $request->tgl_meninggal;
        $sk_kematian->lokasi_meninggal  = $request->lokasi_meninggal;
        $sk_kematian->penyebab_meninggal= $request->penyebab_meninggal;
        $sk_kematian->save();

        return redirect()->route('app.admin.surat-keterangan-kematian-lama.index')->withSuccess('Surat Kematian Lama Berhasil ditambahkan!');
    }

    public function updateDataPenduduk($id)
    {
        $data = SuratKematianLama::find($id);
        abort_if(!$data, 400, 'Surat Kematian Tidak Terdaftar');

        $statusPenduduk = Penduduk::find($data->nik);
        abort_if(!$statusPenduduk, 400, 'Penduduk Tidak Terdaftar');
        $statusPenduduk->is_live = false;
        $statusPenduduk->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Status Kependudukan Sudah di perbaharui!',
            'data'      => $data  
        ]);
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data           = SuratKematianLama::where('no_urut_surat', $request->no)->first();

        $no_surat       = 'Nomor : '.$data->nomor_surat;
        $umur           = $data->umur.' Tahun';
        $jk             = $data->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
        $pekerjaan      = $data->penduduk->Pekerjaan->keterangan;
        $tgl_lahir      = $data->penduduk->tempat_lahir.', '.Carbon::parse($data->penduduk->tgl_lahir)->isoFormat('D MMMM Y');
        $tgl_surat      = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        $tgl_meninggal  = Carbon::parse($data->tgl_meninggal)->isoFormat('D MMMM Y');
        $alamat         = 'RT. '. $data->penduduk->Rt->nomor.' RW. '.$data->penduduk->Rt->rw.' Dusun '.$data->penduduk->Rt->dusun.' DESA '.$data->penduduk->village->name.' KECAMATAN '. $data->penduduk->district->name.' '.$data->penduduk->regency->name.' - '.$data->penduduk->province->name;
        
        return response()->json([
            'data'=>$data,
            'ttl'=>$tgl_lahir,
            'tgl_surat'=>$tgl_surat,
            'tgl_meninggal'=>$tgl_meninggal,
            'no_surat'=>$no_surat,
            'pekerjaan'=>$pekerjaan,
            'umur'=>$umur,
            'jk'=>$jk,
            'alamat'=>$alamat,
        200]);
    }

}
