<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dusun;


class DusunController extends Controller
{
    public function index(Request $request)
    {
        $dusuns = Dusun::all();
        return view('admin.pengaturan.dusun.index', compact('dusuns'));
    }
    public function create()
    {
        return view('admin.pengaturan.dusun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dusun'       => 'required|max:255',
           
        ],[
            'nama_dusun.required'      => 'Nama dusun harus diisi!',
            'nama_dusun.max'           => 'Maksimal 255 karakter!',
        ]);

        Dusun::create([
            'nama_dusun'   => $request->nama_dusun,
        ]);

        return redirect()->route('app.admin.pengaturan.dusun.dusun')->withSuccess('Dusun Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $dusun = Dusun::find($id);
        abort_if(!$dusun, 400, 'Dusun Tidak Terdaftar');
        return view('admin.pengaturan.dusun.edit', compact('dusun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dusun'       => 'required|max:255',
           
        ],[
            'nama_dusun.required'      => 'Nama dusun harus diisi!',
            'nama_dusun.max'           => 'Maksimal 255 karakter!',
        ]);
        $dusun = Dusun::find($id);
        abort_if(!$dusun, 400, 'Dusun Tidak Terdaftar');

        $dusun->nama_dusun   = $request->nama_dusun;
        $dusun->save();

        return redirect()->route('app.admin.pengaturan.dusun.dusun')->withSuccess('Data Dusun Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $dusun = Dusun::find($id);
        abort_if(!$dusun, 400, 'Dusun Tidak Terdaftar');

        $dusun->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dusun Berhasil Dihapus!.',
        ]); 
    }

}
