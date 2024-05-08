<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SDHK;

class SDHKController extends Controller
{
    public function index(Request $request)
    {
        $hubunganKeluarga = SDHK::all();
        return view('admin.pengaturan.sdhk.index', compact('hubunganKeluarga'));
    }
    public function create()
    {
        return view('admin.pengaturan.sdhk.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Hubungan Keluarga harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);

        SDHK::create([
            'keterangan'   => $request->keterangan,
        ]);

        return redirect()->route('app.admin.pengaturan.hubungan-keluarga.index')->withSuccess('Hubungan Keluarga Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $hubunganKeluarga = SDHK::find($id);
        abort_if(!$hubunganKeluarga, 400, 'Hubungan Keluarga Tidak Terdaftar');
        return view('admin.pengaturan.sdhk.edit', compact('hubunganKeluarga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan'       => 'required|max:255',
           
        ],[
            'keterangan.required'      => 'Nama Hubungan Keluarga harus diisi!',
            'keterangan.max'           => 'Maksimal 255 karakter!',
        ]);
        $hubunganKeluarga = SDHK::find($id);
        abort_if(!$hubunganKeluarga, 400, 'Hubungan Keluarga Tidak Terdaftar');

        $hubunganKeluarga->keterangan   = $request->keterangan;
        $hubunganKeluarga->save();

        return redirect()->route('app.admin.pengaturan.hubungan-keluarga.index')->withSuccess('Data Hubungan Keluarga Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $hubunganKeluarga = SDHK::find($id);
        abort_if(!$hubunganKeluarga, 400, 'Hubungan Keluarga Tidak Terdaftar');

        $hubunganKeluarga->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hubungan Keluarga Berhasil Dihapus!.',
        ]); 
    }
}
