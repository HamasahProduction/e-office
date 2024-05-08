<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TagArtikel;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tag = TagArtikel::get();
        return view('penulis.tag.index', compact('tag'));
    }
    public function create()
    {
        return view('penulis.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|max:255',
           
        ],[
            'nama.required'  => 'Nama tag harus diisi!',
            'nama.max'       => 'Maksimal 255 karakter!',
        ]);

        TagArtikel::create([
            'nama'   => $request->nama,
        ]);

        return redirect()->route('app.penulis.tag.tag')->withSuccess('tag Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $tag = TagArtikel::find($id);
        abort_if(!$tag, 400, 'tag Tidak Terdaftar');
        return view('penulis.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'       => 'required|max:255',
           
        ],[
            'nama.required'      => 'Nama tag harus diisi!',
            'nama.max'           => 'Maksimal 255 karakter!',
        ]);
        $tag = TagArtikel::find($id);
        abort_if(!$tag, 400, 'tag Tidak Terdaftar');

        $tag->nama   = $request->nama;
        $tag->save();

        return redirect()->route('app.penulis.tag.tag')->withSuccess('Data tag Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $tag = TagArtikel::find($id);
        abort_if(!$tag, 400, 'tag Tidak Terdaftar');

        $tag->delete();

        return response()->json([
            'success' => true,
            'message' => 'tag Berhasil Dihapus!.',
        ]); 
    }
}
