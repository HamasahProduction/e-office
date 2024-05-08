<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuratKeluarExport;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Carbon\Carbon;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $query      = SuratKeluar::orderBy('tgl_surat','desc');
        $startdate  = date('Y-m') . '-01';
        $enddate    = date('Y-m-d');

        if( $request->filled('startdate'))
        {
            $startdate = $request->startdate;
        }
        if( $request->filled('enddate'))
        {
            $enddate = $request->enddate;
        }
        $surats = $query->whereBetween(\DB::RAW('date(tgl_surat)'), [$startdate, $enddate])->get();
        return view('admin.surat_keluar.index', compact('surats','startdate','enddate','request'));
    }

    public function create()
    {
        return view('admin.surat_keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat'           => 'required',
            'nama_instansi_dituju'  => 'required|max:255',
            'perihal'               => 'required|max:255',
            'deskripsi_surat'       => 'required|max:255',
            'tgl_pengiriman'        => 'required|date',
            'tgl_surat'             => 'required|date',
            'file_surat'            => 'nullable',
           
        ],[
            'nomor_surat'           => 'Nomor surat wajib diisi!',
            'nama_instansi_dituju'  => 'Nama instansi pengirim wajib diisi!',
            'perihal'               => 'Perihal surat wajib diisi!',
            'deskripsi_surat'       => 'Deskripsi surat wajib diisi!',
            'tgl_pengiriman'        => 'Tanggal surat Keluar wajib dipilih!',
            'tgl_surat'             => 'Tanggal surat wajib dipilih',
        ]);

        SuratKeluar::create([
            'file'                  => $request->hasFile('file_surat')?$request->file('file_surat')->store('surat_keluar'):NULL,
            'nomor_surat'           => $request->nomor_surat,
            'nama_instansi_dituju'  => $request->nama_instansi_dituju,
            'perihal'               => $request->perihal,
            'tgl_pengiriman'        => $request->tgl_pengiriman,
            'tgl_surat'             => $request->tgl_surat,
            'deskripsi_surat'       => $request->deskripsi_surat,
        ]);

        return redirect()->route('app.admin.surat-keluar.index')->withSuccess('Surat Keluar Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $surat = SuratKeluar::find($id);
        abort_if(!$surat, 400, 'Surat Tidak Terdaftar');
        return view('admin.surat_keluar.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratKeluar::find($id);
        abort_if(!$surat, 400, 'Surat Tidak Terdaftar');

        $request->validate([
            'nomor_surat'           => 'required',
            'nama_instansi_dituju'  => 'required|max:255',
            'perihal'               => 'required|max:255',
            'deskripsi_surat'       => 'required|max:255',
            'tgl_pengiriman'        => 'required|date',
            'tgl_surat'             => 'required|date',
            'file_surat'            => 'nullable',
           
        ],[
            'nomor_surat'           => 'Nomor surat wajib diisi!',
            'nama_instansi_dituju'  => 'Nama instansi pengirim wajib diisi!',
            'perihal'               => 'Perihal surat wajib diisi!',
            'deskripsi_surat'       => 'Deskripsi surat wajib diisi!',
            'tgl_pengiriman'        => 'Tanggal surat Keluar wajib dipilih!',
            'tgl_surat'             => 'Tanggal surat wajib dipilih',
        ]);

        $surat->file                    = $request->hasFile('file_surat')?$request->file('file_surat')->store('surat_keluar'):$surat->file;
        $surat->nomor_surat             = $request->nomor_surat;
        $surat->nama_instansi_dituju    = $request->nama_instansi_dituju;
        $surat->perihal                 = $request->perihal;
        $surat->tgl_pengiriman          = $request->tgl_pengiriman;
        $surat->tgl_surat               = $request->tgl_surat;
        $surat->deskripsi_surat         = $request->deskripsi_surat;
        $surat->save();
        

        return redirect()->route('app.admin.surat-keluar.index')->withSuccess('Surat Keluar Berhasil ditambahkan!');
    }

    public function remove($id)
    {
        $suratKeluar = SuratKeluar::find($id);
        abort_if(!$suratKeluar, 400, 'Surat Keluar Tidak Terdaftar');

        $suratKeluar->delete();

        return response()->json([
            'success' => true,
            'message' => 'Surat Keluar Berhasil Dihapus!.',
        ]); 
    }

    public function export(Request $request)
    {
        $namaFile = 'Data-Surat-Keluar-'.now().'.xlsx';
        return Excel::download(new SuratKeluarExport, $namaFile);
    }
}
