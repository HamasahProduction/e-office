<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lembaga;
use App\Models\Penduduk;
use App\Models\JabatanPengurus;
use App\Models\PengurusLembaga;

class PengurusLembagaController extends Controller
{

    public function jabatan(Request $request)
    {
        $jabatans = JabatanPengurus::get();
        return view('admin.kelembagaan.pengurus.jabatan.index',compact('jabatans'));
    }
    
    public function jabatanCreate()
    {
        return view('admin.kelembagaan.pengurus.jabatan.create');
    }
    
    public function jabatanStore(Request $request)
    {
        $request->validate([
            'nama_jabatan'          => 'required|max:255',
           
        ],[
            'nama_jabatan.required' => 'Nama dusun harus diisi!',
            'nama_jabatan.max'      => 'Maksimal 255 karakter!',
        ]);

        JabatanPengurus::create([
            'nama_jabatan'   => $request->nama_jabatan,
        ]);

        return redirect()->route('app.admin.kelembagaan.pengurus.jabatan')->withSuccess('Jabatan Pengurus Berhasil ditambahkan!');
    }
    public function jabatanEdit($id)
    {
        $jabatan = JabatanPengurus::find($id);
        abort_if(!$jabatan, 400, 'Jabatan Tidak Terdaftar');
        return view('admin.kelembagaan.pengurus.jabatan.edit', compact('jabatan'));
    }
    
    public function jabatanUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan'          => 'required|max:255',
           
        ],[
            'nama_jabatan.required' => 'Nama dusun harus diisi!',
            'nama_jabatan.max'      => 'Maksimal 255 karakter!',
        ]);

        $jabatan = JabatanPengurus::find($id);
        abort_if(!$jabatan, 400, 'Jabatan Tidak Terdaftar');

        $jabatan->nama_jabatan   = $request->nama_jabatan;
        $jabatan->save();

        return redirect()->route('app.admin.kelembagaan.pengurus.jabatan')->withSuccess('Jabatan Pengurus Berhasil diperbaharui!');
    }

    public function jabatanRemove($id)
    {
        $jabatan = JabatanPengurus::find($id);
        abort_if(!$jabatan, 400, 'jabatan Tidak Terdaftar');

        $jabatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jabatan Berhasil Dihapus!.',
        ]); 
    }

    public function index(Request $request)
    {
        $isActive = $request->view !== 'inactive';
        $pengurus = $isActive ? PengurusLembaga::active()->get() : PengurusLembaga::inactive()->get();

        $activeCount    = PengurusLembaga::active()->count();
        $inactiveCount  = PengurusLembaga::inactive()->count();
        return view('admin.kelembagaan.pengurus.index', compact('pengurus', 'activeCount','inactiveCount'));
    }
    public function create(Request $request)
    {
        $lembagas = Lembaga::active()->get();
        $penduduks = Penduduk::active()->get();
        $jabatans = JabatanPengurus::get();
        return view('admin.kelembagaan.pengurus.create', compact('lembagas','penduduks','jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'               => 'required',
            'lembaga_id'        => 'required',
            'jabatan_id'        => 'required',
            'tgl_pengangkatan'  => 'required|date',
           
        ],[
            'nik.required'              => 'Nik penduduk harus dipilih!',
            'lembaga_id.required'       => 'Lembaga harus dipilih!',
            'jabatan_id.required'       => 'Jabatan pengurus harus dipilih!',
            'tgl_pengangkatan.required' => 'Tanggal pengangkatan harus dipilih!',
        ]);

        $penduduk   = Penduduk::find($request->nik);
        abort_if(!$penduduk, 400, 'Penduduk Tidak Terdaftar');

        $lembaga    = Lembaga::find($request->lembaga_id);
        abort_if(!$lembaga, 400, 'Lembaga Tidak Terdaftar');
        
        $jabatan    = JabatanPengurus::find($request->jabatan_id);
        abort_if(!$jabatan, 400, 'Jabatan Tidak Terdaftar');

        PengurusLembaga::create([
            'nik'               => $penduduk->nik,
            'lembaga_id'        => $lembaga->id,
            'jabatan_id'        => $jabatan->id,
            'tgl_pengangkatan'  => $request->tgl_pengangkatan,
            'is_active'         => true,
        ]);

        return redirect()->route('app.admin.kelembagaan.pengurus.index')->withSuccess('Pengurus Berhasil ditambahkan!');
    }

    public function pemberhentian(Request $request, $id)
    {
        $data = PengurusLembaga::find($id);
        abort_if(!$data, 400, 'Pengurus Tidak Terdaftar');

        $data->is_active = false;
        $data->tgl_pemberhentian = $request->tgl_pemberhentian;
        $data->save();

        return response()->json([
            'success' => true,
            'icon'    => 'success',
            'message' => 'Pengurus berhasil di-berhentikan!',
            'data'    => $data  
        ]);
    }

}
