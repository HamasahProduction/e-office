<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pekerjaan;

class PekerjaanController extends Controller
{
    public function index(Request $request)
    {
        $pekerjaan = Pekerjaan::all();
        return view('admin.pengaturan.pekerjaan.index', compact('pekerjaan'));
    }
    public function create()
    {
        return view('admin.pengaturan.pekerjaan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Pekerjaan harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);

        Pekerjaan::create([
            'keterangan'   => $request->keterangan,
        ]);

        return redirect()->route('app.admin.pengaturan.pekerjaan.index')->withSuccess('Pekerjaan Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        abort_if(!$pekerjaan, 400, 'Pekerjaan Tidak Terdaftar');
        return view('admin.pengaturan.pekerjaan.edit', compact('pekerjaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Pekerjaan harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);
        $pekerjaan = Pekerjaan::find($id);
        abort_if(!$pekerjaan, 400, 'Pekerjaan Tidak Terdaftar');

        $pekerjaan->keterangan   = $request->keterangan;
        $pekerjaan->save();

        return redirect()->route('app.admin.pengaturan.pekerjaan.index')->withSuccess('Data Pekerjaan Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        abort_if(!$pekerjaan, 400, 'Pekerjaan Tidak Terdaftar');

        $pekerjaan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pekerjaan Berhasil Dihapus!.',
        ]); 
    }
}
