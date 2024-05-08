<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RW;
use App\Models\RT;

class RWController extends Controller
{
    public function rw(Request $request)
    {
        $rws = RW::all();
        return view('admin.pengaturan.rw.index', compact('rws'));
    }
    public function create()
    {
        return view('admin.pengaturan.rw.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nomor'       => 'required|max:255',
           
        ],[
            'nomor.required'      => 'Nama dusun harus diisi!',
            'nomor.max'           => 'Maksimal 255 karakter!',
        ]);

        RW::create([
            'nomor'   => $request->nomor,
        ]);

        return redirect()->route('app.admin.pengaturan.rw.rw')->withSuccess('Dusun Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $rws = RW::find($id);
        abort_if(!$rws, 400, 'Dusun Tidak Terdaftar');
        return view('admin.pengaturan.rw.edit', compact('rws'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor'       => 'required|max:255',
           
        ],[
            'nomor.required'      => 'Nama dusun harus diisi!',
            'nomor.max'           => 'Maksimal 255 karakter!',
        ]);
        $rws = RW::find($id);
        abort_if(!$rws, 400, 'Dusun Tidak Terdaftar');

        $rws->nomor   = $request->nomor;
        $rws->save();

        return redirect()->route('app.admin.pengaturan.rw.rw')->withSuccess('Data Rw Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $rws = RW::find($id);
        abort_if(!$rws, 400, 'Rw Tidak Terdaftar');

        $rws->delete();

        return response()->json([
            'success' => true,
            'message' => 'Rw Berhasil Dihapus!.',
        ]); 
    }
}
