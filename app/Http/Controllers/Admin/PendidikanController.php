<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    public function index(Request $request)
    {
        $pendidikan = Pendidikan::all();
        return view('admin.pengaturan.pendidikan.index', compact('pendidikan'));
    }
    public function create()
    {
        return view('admin.pengaturan.pendidikan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Pendidikan harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);

        Pendidikan::create([
            'keterangan'   => $request->keterangan,
        ]);

        return redirect()->route('app.admin.pengaturan.pendidikan.index')->withSuccess('Pendidikan Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $pendidikan = Pendidikan::find($id);
        abort_if(!$pendidikan, 400, 'Pendidikan Tidak Terdaftar');
        return view('admin.pengaturan.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Pendidikan harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);
        $pendidikan = Pendidikan::find($id);
        abort_if(!$pendidikan, 400, 'Pendidikan Tidak Terdaftar');

        $pendidikan->keterangan   = $request->keterangan;
        $pendidikan->save();

        return redirect()->route('app.admin.pengaturan.pendidikan.index')->withSuccess('Data Pendidikan Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $pendidikan = Pendidikan::find($id);
        abort_if(!$pendidikan, 400, 'Pendidikan Tidak Terdaftar');

        $pendidikan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pendidikan Berhasil Dihapus!.',
        ]); 
    }
}
