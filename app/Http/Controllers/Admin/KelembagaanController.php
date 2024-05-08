<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lembaga;

class KelembagaanController extends Controller
{
    public function index(Request $request)
    {
        $isActive = $request->view !== 'inactive';
        $lembagas = $isActive ? Lembaga::active()->get() : Lembaga::inactive()->get();

        $activeCount    = Lembaga::active()->count();
        $inactiveCount  = Lembaga::inactive()->count();
        return view('admin.kelembagaan.lembaga.index', compact('lembagas', 'activeCount','inactiveCount'));
    }
    public function create(Request $request)
    {
        return view('admin.kelembagaan.lembaga.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
       $request->validate([
        'nama_lembaga'  => 'required|max:255',
        'image'         => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ],[
            'nama_lembaga.required' => 'Nama Lembaga harus diisi!',
            'nama_lembaga.max'      => 'Maksimal 255 karakter!',
            'image.required'        => 'Extension file hanya boleh jpeg,png,jpg,svg!',
        ]);

        Lembaga::create([
            'nama_lembaga'  => $request->nama_lembaga,
            'image'         => $request->file('image')->store('lembaga'),
            'is_active'     => true,
        ]);

        return redirect()->route('app.admin.kelembagaan.lembaga.index')->withSuccess('Lembaga Berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $lembaga = Lembaga::find($id);
        abort_if(!$lembaga, 400, 'Lembaga Tidak Terdaftar');

        return view('admin.kelembagaan.lembaga.edit', compact('lembaga'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama_lembaga'  => 'required|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ],[
            'nama_lembaga.required' => 'Nama Lembaga harus diisi!',
            'nama_lembaga.max'      => 'Maksimal 255 karakter!',
            'image.required'        => 'Extension file hanya boleh jpeg,png,jpg,svg!',
        ]);

        $lembaga = Lembaga::find($id);
        abort_if(!$lembaga, 400, 'Lembaga Tidak Terdaftar');
        $requestImage = $lembaga->image;

        if ( $request->hasFile('image')) {
            $requestImage = $request->file('image')->store('lembaga');
        }
        
        $lembaga->nama_lembaga         = $request->nama_lembaga;
        $lembaga->image         = $requestImage;
        $lembaga->save();
       
        return redirect()->route('app.admin.kelembagaan.lembaga.index')->withSuccess('Lembaga Berhasil diperbaharui!');
    }

    public function remove($id)
    {
        $lembaga = Lembaga::find($id);
        abort_if(!$lembaga, 400, 'Lembaga Tidak Terdaftar');

        $lembaga->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lembaga Berhasil Dihapus!.',
        ]); 
    }

    public function activate($id)
    {
        $lembaga = Lembaga::find($id);
        abort_if(!$lembaga, 400, 'Lembaga Tidak Terdaftar');

        $lembaga->is_active = true;
        $lembaga->save();

        return response()->json([
            'success' => true,
            'message' => 'Lembaga berhasil di-aktifkan!',
            'data'    => $lembaga  
        ]);
    }

    public function inactivate($id)
    {
        $lembaga = Lembaga::find($id);
        abort_if(!$lembaga, 400, 'Lembaga Tidak Terdaftar');

        $lembaga->is_active = false;
        $lembaga->save();

        return response()->json([
            'success' => true,
            'message' => 'Lembaga berhasil dinon-aktifkan!',
            'data'    => $lembaga  
        ]);
    }
}
