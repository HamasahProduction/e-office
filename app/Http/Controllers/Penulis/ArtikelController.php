<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriArtikel;
use App\Models\Artikel;
use Auth;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $artikel = Artikel::get();
        return view('penulis.artikel.index', compact('artikel'));
    }
    public function create(Request $request)
    {
        $kategori = KategoriArtikel::whereNotIn('id',[1])->get();
        return view('penulis.artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content'       => 'required',
            'judul'         => 'required',
            'tgl_posting'   => 'required',
            'kategori_id'   => 'required',
            'thumbnail'     => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
           
        ],[
            'content.required'      => 'Konten harus diisi!',
            'judul.required'        => 'Judul harus diisi!',
            'tgl_posting.required'  => 'Tanggal Posting harus diisi!',
            'kategori_id.required'  => 'Kategori harus dipilih!',
            'thumbnail.required'    => 'Extension file hanya boleh jpeg,png,jpg,svg!',
        ]);

        $kategori = KategoriArtikel::find($request->kategori_id);
        
        Artikel::create([
            'thumbnail'     => $request->file('thumbnail')->store('thumbnail_article'),
            'konten'        => $request->content,
            'judul'         => $request->judul,
            'slug'          => str_replace(' ', '-', $request->judul),
            'tgl_posting'   => $request->tgl_posting,
            'kategori_id'   => $request->kategori_id,
            'user'          => Auth::user()->name,
        ]);

        return redirect()->route('app.penulis.artikel.artikel')->withSuccess('Artikel Berhasil ditambahkan!');
    }

    public function publish($id)
    {
        $data       = Artikel::find($id);
        abort_if(!$data, 400, 'artikel tidak ditemukan!');
        $data->status_posting = true;
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Artikel Berhasil Di Publish!',
            'data'      => $data  
        ]);
    }
    
}
