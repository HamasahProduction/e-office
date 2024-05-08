<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use Carbon\Carbon;
use Auth;

class DokumentasiController extends Controller
{
    public function index(Request $request)
    {
        $tgl_publish    = $request->tgl_publish==null?Carbon::now()->format('Y-m-d') : $request->tgl_publish;
        $query          = Dokumentasi::orderBy('tgl_publish','desc');
        if($request->has('tgl_publish') && !empty($request->input('tgl_publish')))
        {
            $query->whereDate('tgl_publish','=', $request->tgl_publish);
        }
        $dokumentasi = $query->get();
        return view('admin.dokumentasi.index', compact('dokumentasi','tgl_publish'));
    }
    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required',
            'tgl_publish'   => 'required|date',
            'file'          => 'required',
           
        ],[
            'judul'         => 'Judul Dokumentasi wajib diisi!',
            'tgl_publish'   => 'Tanggal Publish wajib diisi!',
            'file'          => 'File Wajib dipilih',
        ]);

        Dokumentasi::create([
            'file'          => $request->hasFile('file')?$request->file('file')->store('file_dokumentasi'):NULL,
            'judul'         => $request->judul,
            'tgl_publish'   => $request->tgl_publish,
            'user_id'       => Auth::user()->id,
            'is_publish'    => false,
        ]);

        return redirect()->route('app.admin.dokumentasi.index')->withSuccess('Dokumentasi Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dokumentasi = Dokumentasi::find($id);
        abort_if(!$dokumentasi, 400, 'Dokumentasi Tidak Terdaftar');
        return view('admin.dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, $id)
    {
        $dokumentasi = Dokumentasi::find($id);
        abort_if(!$dokumentasi, 400, 'Dokumentasi Tidak Terdaftar');

        $request->validate([
            'judul'         => 'required',
            'tgl_publish'   => 'required|date',
            'file'          => 'required',
           
        ],[
            'judul'         => 'Judul Dokumentasi wajib diisi!',
            'tgl_publish'   => 'Tanggal Publish wajib diisi!',
            'file'          => 'File Wajib dipilih',
        ]);

        $dokumentasi->file          = $request->hasFile('file')?$request->file('file')->store('file_dokumentasi'):$dokumentasi->file;
        $dokumentasi->judul         = $request->judul;
        $dokumentasi->tgl_publish   = $request->tgl_publish;
        $dokumentasi->user_id       = Auth::user()->id;
        $dokumentasi->is_publish    = false;
        $dokumentasi->save();
        

        return redirect()->route('app.admin.dokumentasi.index')->withSuccess('Dokumentasi Berhasil perbaharui!');
    }

    public function publish($id)
    {
        $data       = Dokumentasi::find($id);
        abort_if(!$data, 400, 'dokumentasi tidak ditemukan!');
        $data->is_publish = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Dokumentasi Berhasil Di Publish!',
            'data'      => $data  
        ]);
    }
    public function takedown($id)
    {
        $data       = Dokumentasi::find($id);
        abort_if(!$data, 400, 'dokumentasi tidak ditemukan!');
        $data->is_publish = false;
        $data->save();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Dokumentasi Berhasil Di Takedown',
            'data'      => $data  
        ]);
    }
}
