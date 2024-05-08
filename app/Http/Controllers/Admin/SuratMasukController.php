<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuratMasukExport;
use App\Models\LampiransuratMasuk;
use App\Models\SuratMasuk;
use Carbon\Carbon;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $query      = SuratMasuk::with('lampiran')->orderBy('tgl_surat','desc');
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
        return view('admin.surat_masuk.index', compact('surats','startdate','enddate','request'));
    }

    public function create()
    {
        return view('admin.surat_masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat'           => 'required',
            'nama_instansi_pengirim'=> 'required|max:255',
            'perihal'               => 'required|max:255',
            'deskripsi_surat'       => 'required|max:255',
            'tgl_surat_masuk'       => 'required|date',
            'tgl_surat'             => 'required|date',
            'file_surat'            => 'nullable',
           
        ],[
            'nomor_surat'           => 'Nomor surat wajib diisi!',
            'nama_instansi_pengirim'=> 'Nama instansi pengirim wajib diisi!',
            'perihal'               => 'Perihal surat wajib diisi!',
            'deskripsi_surat'       => 'Deskripsi surat wajib diisi!',
            'tgl_surat_masuk'       => 'Tanggal surat masuk wajib dipilih!',
            'tgl_surat'             => 'Tanggal surat wajib dipilih',
        ]);

        SuratMasuk::create([
            'file'                  => $request->hasFile('file_surat')?$request->file('file_surat')->store('file_surat_masuk'):NULL,
            'nomor_surat'           => $request->nomor_surat,
            'nama_instansi_pengirim'=> $request->nama_instansi_pengirim,
            'perihal'               => $request->perihal,
            'tgl_surat_masuk'       => $request->tgl_surat_masuk,
            'tgl_surat'             => $request->tgl_surat,
            'deskripsi_surat'       => $request->deskripsi_surat,
        ]);
        
        return redirect()->route('app.admin.surat-masuk.index')->withSuccess('Surat Masuk Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $surat = SuratMasuk::find($id);
        abort_if(!$surat, 400, 'Surat Tidak Terdaftar');
        return view('admin.surat_masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratMasuk::find($id);
        abort_if(!$surat, 400, 'Surat Tidak Terdaftar');

        $request->validate([
            'nomor_surat'           => 'required',
            'nama_instansi_pengirim'=> 'required|max:255',
            'perihal'               => 'required|max:255',
            'deskripsi_surat'       => 'required|max:255',
            'tgl_surat_masuk'       => 'required|date',
            'tgl_surat'             => 'required|date',
            'file_surat'            => 'nullable',
           
        ],[
            'nomor_surat'           => 'Nomor surat wajib diisi!',
            'nama_instansi_pengirim'=> 'Nama instansi pengirim wajib diisi!',
            'perihal'               => 'Perihal surat wajib diisi!',
            'deskripsi_surat'       => 'Deskripsi surat wajib diisi!',
            'tgl_surat_masuk'       => 'Tanggal surat masuk wajib dipilih!',
            'tgl_surat'             => 'Tanggal surat wajib dipilih',
        ]);

        $surat->file                   = $request->hasFile('file_surat')?$request->file('file_surat')->store('file_surat_masuk'):$surat->file;
        $surat->nomor_surat            = $request->nomor_surat;
        $surat->nama_instansi_pengirim = $request->nama_instansi_pengirim;
        $surat->perihal                = $request->perihal;
        $surat->tgl_surat_masuk        = $request->tgl_surat_masuk;
        $surat->tgl_surat              = $request->tgl_surat;
        $surat->deskripsi_surat        = $request->deskripsi_surat;
        $surat->save();
        

        return redirect()->route('app.admin.surat-masuk.index')->withSuccess('Surat Masuk Berhasil ditambahkan!');
    }

    public function lampiran(Request $request, $id)
    {
        $request->validate([
            'file_surat'            => 'required',
           
        ],[
            'file_surat'            => 'File surat wajib dipilih',
        ]);
        $uploadFile       = SuratMasuk::find($id);
        abort_if(!$uploadFile, 400, 'Surat Tidak Terdaftar');
        $uploadFile->file = $request->hasFile('file_surat')?$request->file('file_surat')->store('file_surat_masuk', 'public'):NULL;
        $uploadFile->save();
        return redirect()->route('app.admin.surat-masuk.index')->withSuccess('LampiranSurat Masuk Berhasil ditambahkan!');
    }

    public function remove($id)
    {
        $suratMasuk = SuratMasuk::find($id);
        abort_if(!$suratMasuk, 400, 'Surat Masuk Tidak Terdaftar');

        $suratMasuk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Surat Masuk Berhasil Dihapus!.',
        ]); 
    }

    public function export(Request $request)
    {
        $namaFile = 'Data-Surat-Masuk-'.now().'.xlsx';
        return Excel::download(new SuratMasukExport, $namaFile);
    }

}
