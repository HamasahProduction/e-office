<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\SuratKeteranganAhliWaris;
use App\Models\AnggotaAhliWaris;
use App\Models\RT;
use Carbon\Carbon;

class SuratKeteranganAhliWarisController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKeteranganAhliWaris::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $sk_ahli_waris = $query->get();
        return view('admin.layanan_umum.sk_ahli_waris.index', compact('sk_ahli_waris','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_ahli_waris.create', compact('penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik_ahli_waris'    => 'required|array',
            'nama_pewaris'      => 'required|max:255',
            'alamat_pewaris'    => 'required|max:255',
            'nama_ketua_rt'     => 'required',
            'nama_ketua_rw'     => 'required',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik_ahli_waris'    => 'Silahkan Pilih Ahli Waris!!',
            'nama_pewaris'      => 'Nama Pewaris wajib diisi!!',
            'alamat_pewaris'    => 'Alamat Pewaris wajib diidi!!',
            'nama_ketua_rt'     => 'Nama Ketua RT wajib diisi!!',
            'nama_ketua_rw'     => 'Nama Ketua RW wajib diisi!!',
            'tgl_surat'         => 'Tanggal Surat wajib dipilih!!',
        ]);

        $lastRecord = SuratKeteranganAhliWaris::orderBy('created_at', 'desc')->first();

        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }
        $surat      = DaftarSurat::find(19);
        $ahliWaris  = SuratKeteranganAhliWaris::create([
            'nomor_surat'       => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'no_urut_surat'     => $nextNomorUrut,
            'nama_pewaris'      => $request->nama_pewaris,
            'alamat_pewaris'    => $request->alamat_pewaris,
            'ketua_rt'          => strtoupper($request->nama_ketua_rt),
            'ketua_rw'          => strtoupper($request->nama_ketua_rw),
            'tgl_surat'         => $request->tgl_surat,
            'is_cetak'          => false,
        ]);

        foreach ($request->nik_ahli_waris as $value) {
            $penduduk = Penduduk::active()->where('is_mutasi', false)->where('nik', $value)->first(); 
            if ($penduduk) {
                AnggotaAhliWaris::create([
                    'id_ahli_waris' => $ahliWaris->id,
                    'nik'           => $value,
                    'nama'          => $penduduk->nama_lengkap,
                    'ttl'           => $penduduk->tempat_lahir.', '.Carbon::parse($penduduk->tgl_lahir)->isoFormat('D MMMM Y'),
                    'alamat'        => 'RT. '. $penduduk->Rt->nomor.' RW. '.$penduduk->Rt->rw.' DUSUN '.$penduduk->Rt->dusun.' DESA '.$penduduk->village->name.' KECAMATAN '. $penduduk->district->name.' '.$penduduk->regency->name.' - '.$penduduk->province->name,
                ]);
            }
        }

        return redirect()->route('app.admin.surat-keterangan-ahli-waris.index')->withSuccess('Surat Keterangan Ahli Waris Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        $surat     = SuratKeteranganAhliWaris::find($id);
        $ahliWaris = AnggotaAhliWaris::where('id_ahli_waris', $id)->get();
        return view('admin.layanan_umum.sk_ahli_waris.edit', compact('penduduks','surat','ahliWaris'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nik_ahli_waris'    => 'required|array',
            'nama_pewaris'      => 'required|max:255',
            'alamat_pewaris'    => 'required|max:255',
            'nama_ketua_rt'     => 'required',
            'nama_ketua_rw'     => 'required',
            'tgl_surat'         => 'required|date',
           
        ],[
            'nik_ahli_waris'    => 'Silahkan Pilih Ahli Waris!!',
            'nama_pewaris'      => 'Nama Pewaris wajib diisi!!',
            'alamat_pewaris'    => 'Alamat Pewaris wajib diidi!!',
            'nama_ketua_rt'     => 'Nama Ketua RT wajib diisi!!',
            'nama_ketua_rw'     => 'Nama Ketua RW wajib diisi!!',
            'tgl_surat'         => 'Tanggal Surat wajib dipilih!!',
        ]);
        $surat                 = SuratKeteranganAhliWaris::find($id);
        $surat->nomor_surat    = $surat->nomor_surat;
        $surat->no_urut_surat  = $surat->no_urut_surat;
        $surat->nama_pewaris   = $request->nama_pewaris;
        $surat->alamat_pewaris = $request->alamat_pewaris;
        $surat->ketua_rt       = strtoupper($request->nama_ketua_rt);
        $surat->ketua_rw       = strtoupper($request->nama_ketua_rw);
        $surat->tgl_surat      = $request->tgl_surat;
        $surat->is_cetak       = false;
        $surat->save();
       // Query AnggotaAhliWaris outside the loop
        $cekAnggotaPerubahan = AnggotaAhliWaris::where('id_ahli_waris', $id)->pluck('nik')->toArray();

        foreach ($request->nik_ahli_waris as $value) {
            // Query Penduduk
            $penduduk = Penduduk::active()->where('is_mutasi', false)->where('nik', $value)->first(); 
            
            // Update or create record in AnggotaAhliWaris
            AnggotaAhliWaris::updateOrCreate(
                [
                    'nik' => $value,
                ],
                [
                    'id_ahli_waris' => $surat->id,
                    'nik'           => $value,
                    'nama'          => $penduduk ? $penduduk->nama_lengkap : null,
                    'ttl'           => $penduduk ? $penduduk->tempat_lahir.', '.Carbon::parse($penduduk->tgl_lahir)->isoFormat('D MMMM Y') : null,
                    'alamat'        => $penduduk ? 'RT. '. $penduduk->Rt->nomor.' RW. '.$penduduk->Rt->rw.' DUSUN '.$penduduk->Rt->dusun.' DESA '.$penduduk->village->name.' KECAMATAN '. $penduduk->district->name.' '.$penduduk->regency->name.' - '.$penduduk->province->name : null,
                ]
            );
        }

        // Delete records not present in $request->nik_ahli_waris
        AnggotaAhliWaris::where('id_ahli_waris', $id)
            ->whereNotIn('nik', $request->nik_ahli_waris)
            ->delete();

        
        return redirect()->route('app.admin.surat-keterangan-ahli-waris.index')->withSuccess('Surat Keterangan Ahli Waris Berhasil di Perbaharui!');
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = SuratKeteranganAhliWaris::find($request->id);
        $anggota    = AnggotaAhliWaris::where('id_ahli_waris', $request->id)->get();
        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        
        return response()->json([
            'data'=>$data,
            'anggota'=>$anggota,
            'tgl_surat'=>$tgl_surat,
            'no_surat'=>$no_surat,
        200]);
    }
}
