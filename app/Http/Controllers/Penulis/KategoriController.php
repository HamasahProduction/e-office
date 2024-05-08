<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriArtikel;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = KategoriArtikel::get();
        return view('penulis.kategori.index', compact('kategori'));
    }
    public function create()
    {
        return view('penulis.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|max:255',
           
        ],[
            'nama.required'  => 'Nama Kategori harus diisi!',
            'nama.max'       => 'Maksimal 255 karakter!',
        ]);

        KategoriArtikel::create([
            'nama'   => $request->nama,
        ]);

        return redirect()->route('app.penulis.kategori.kategori')->withSuccess('Kategori Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $kategori = KategoriArtikel::find($id);
        abort_if(!$kategori, 400, 'Kategori Tidak Terdaftar');
        return view('penulis.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'       => 'required|max:255',
           
        ],[
            'nama.required'      => 'Nama Kategori harus diisi!',
            'nama.max'           => 'Maksimal 255 karakter!',
        ]);
        $kategori = KategoriArtikel::find($id);
        abort_if(!$kategori, 400, 'Kategori Tidak Terdaftar');

        $kategori->nama   = $request->nama;
        $kategori->save();

        return redirect()->route('app.penulis.kategori.kategori')->withSuccess('Data Kategori Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $kategori = KategoriArtikel::find($id);
        abort_if(!$kategori, 400, 'Kategori Tidak Terdaftar');

        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori Berhasil Dihapus!.',
        ]); 
    }
}
