<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPerangkatPemerintah;

class PejabatPemeritahController extends Controller
{
    public function index(Request $request)
    {
        $isActive = $request->view !== 'inactive';
        $activeCount    = DataPerangkatPemerintah::active()->count();
        $inactiveCount  = DataPerangkatPemerintah::inactive()->count();

        $pejabat = $isActive ? DataPerangkatPemerintah::active()->get() : DataPerangkatPemerintah::inactive()->get();
        return view('admin.pejabat_pemerintah.index', compact('pejabat','activeCount','inactiveCount'));
    }

    public function create()
    {
        return view('admin.pejabat_pemerintah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required|max:255',
            'jabatan'           => 'required|max:255',
            'nip'               => 'required|min:16',
           
        ],[
            'nama.required'     => 'Nama harus diisi!',
            'nip.required'      => 'NIP harus diisi!',
            'jabatan.required'  => 'Jabatan harus diisi!',
            'nama.max'          => 'Maksimal 255 karakter!',
            'jabatan.max'       => 'Maksimal 255 karakter!',
            'nip.min'           => 'Minimal 16 karakter!',
            'nip.unique'        => 'NIP Sudah digunakan!',
        ]);
        DataPerangkatPemerintah::create([
            'nama'              => $request->nama,
            'jabatan'           => $request->jabatan,
            'nip'               => $request->nip,
            'is_active'         => true,
        ]);
        return redirect()->route('app.admin.pejabat_pemerintah.index')->withSuccess('Agent berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $perangkat = DataPerangkatPemerintah::find($id);
        abort_if(!$perangkat, 400, 'Perangkat Pemerintah Tidak Terdaftar');
        return view('admin.pejabat_pemerintah.edit', compact('perangkat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'              => 'required|max:255',
            'jabatan'           => 'required|max:255',
            'nip'               => 'required|min:16',
           
        ],[
            'nama.required'     => 'Nama harus diisi!',
            'nip.required'      => 'NIP harus diisi!',
            'jabatan.required'  => 'Jabatan harus diisi!',
            'nama.max'          => 'Maksimal 255 karakter!',
            'jabatan.max'       => 'Maksimal 255 karakter!',
            'nip.min'           => 'Minimal 16 karakter!',
            'nip.unique'        => 'NIP Sudah digunakan!',
        ]);
        $perangkat = DataPerangkatPemerintah::find($id);
        abort_if(!$perangkat, 400, 'Perangkat Pemerintah Tidak Terdaftar');
        $perangkat->nama              = $request->nama;
        $perangkat->jabatan           = $request->jabatan;
        $perangkat->nip               = $request->nip;
        $perangkat->is_active         = true;
        $perangkat->save();
        return redirect()->route('app.admin.pejabat_pemerintah.index')->withSuccess('Data Perangkat Pemerintah Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $perangkat = DataPerangkatPemerintah::find($id);
        abort_if(!$perangkat, 400, 'Perangkat Pemerintah Tidak Terdaftar');

        $perangkat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Perangkat Pemerintah Berhasil Dihapus!.',
        ]); 
    }

    public function activate($id)
    {
        $perangkat = DataPerangkatPemerintah::find($id);
        abort_if(!$perangkat, 400, 'Perangkat Pemerintah Tidak Terdaftar');

        $perangkat->is_active = true;
        $perangkat->save();

        return response()->json([
            'success' => true,
            'message' => 'Perangkat Pemerintah berhasil di-aktifkan!',
            'data'    => $perangkat  
        ]);
    }

    public function inactivate($id)
    {
        $perangkat = DataPerangkatPemerintah::find($id);
        abort_if(!$perangkat, 400, 'Perangkat Pemerintah Tidak Terdaftar');

        $perangkat->is_active = false;
        $perangkat->save();

        return response()->json([
            'success' => true,
            'message' => 'Perangkat Pemerintah berhasil dinon-aktifkan!',
            'data'    => $perangkat  
        ]);
    }

}
