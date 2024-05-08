<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusPerkawinan;


class StatusPerkawinanController extends Controller
{
    public function index(Request $request)
    {
        $status_perkawinan = StatusPerkawinan::all();
        return view('admin.pengaturan.status_perkawinan.index', compact('status_perkawinan'));
    }
    public function create()
    {
        return view('admin.pengaturan.status_perkawinan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Pekerjaan harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);

        StatusPerkawinan::create([
            'keterangan'   => $request->keterangan,
        ]);

        return redirect()->route('app.admin.pengaturan.status-perkawinan.index')->withSuccess('Pekerjaan Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $status_perkawinan = StatusPerkawinan::find($id);
        abort_if(!$status_perkawinan, 400, 'Status Perkawinan Tidak Terdaftar');
        return view('admin.pengaturan.status_perkawinan.edit', compact('status_perkawinan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Status Perkawinan harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);
        $status_perkawinan = StatusPerkawinan::find($id);
        abort_if(!$status_perkawinan, 400, 'Status Perkawinan Tidak Terdaftar');

        $status_perkawinan->keterangan   = $request->keterangan;
        $status_perkawinan->save();

        return redirect()->route('app.admin.pengaturan.status-perkawinan.index')->withSuccess('Data Pekerjaan Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $status_perkawinan = StatusPerkawinan::find($id);
        abort_if(!$status_perkawinan, 400, 'Status Perkawinan Tidak Terdaftar');

        $status_perkawinan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Status Perkawinan Berhasil Dihapus!.',
        ]); 
    }
}
