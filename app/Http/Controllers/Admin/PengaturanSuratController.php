<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPerangkatPemerintah;
use App\Models\PengaturanSurat;

class PengaturanSuratController extends Controller
{
    public function index()
    {
        $dataPengaturan = PengaturanSurat::all();
        return view('admin.pengaturan.surat.index', compact('dataPengaturan'));
    }

    public function create()
    {
        $ttds = DataPerangkatPemerintah::get();
        return view('admin.pengaturan.surat.create', compact('ttds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_surat'       => 'required|max:255',
            'kode_surat'        => 'required|max:255',
            'nomor_surat'       => 'required|max:255',
            'is_ttd'            => 'required',
           
        ],[
            'judul_surat.required'      => 'Nama harus diisi!',
            'kode_surat.required'       => 'Nomor Surat harus diisi!',
            'nomor_surat.required'      => 'Nomor Surat harus diisi!',
            'judul_surat.max'           => 'Maksimal 255 karakter!',
            'nomor_surat.max'           => 'Maksimal 255 karakter!',
        ]);
        $ttds = DataPerangkatPemerintah::find($request->is_ttd);
        abort_if(!$ttds, 400, 'Perangkat Pemerintah Tidak Terdaftar');

        PengaturanSurat::create([
            'judul_surat'   => $request->judul_surat,
            'kode_surat'    => $request->kode_surat,
            'nomor_surat'   => $request->nomor_surat,
            'jabatan'       => $ttds->jabatan,
            'nama_ttd'      => $ttds->nama,
            'is_ttd'        => $ttds->id,
        ]);

        return redirect()->route('app.admin.pengaturan.surat.surat')->withSuccess('Pengaturan Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $pengaturan = PengaturanSurat::find($id);
        abort_if(!$pengaturan, 400, 'Pengaturan Tidak Terdaftar');

        $ttds = DataPerangkatPemerintah::get();
        abort_if(!$ttds, 400, 'Perangkat Pemerintah Tidak Terdaftar');
        return view('admin.pengaturan.surat.edit', compact('pengaturan', 'ttds'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_surat'       => 'required|max:255',
            'kode_surat'        => 'required|max:255',
            'nomor_surat'       => 'required|max:255',
            'is_ttd'            => 'required',
           
        ],[
            'judul_surat.required'      => 'Nama harus diisi!',
            'kode_surat.required'       => 'Nomor Surat harus diisi!',
            'nomor_surat.required'      => 'Nomor Surat harus diisi!',
            'judul_surat.max'           => 'Maksimal 255 karakter!',
            'nomor_surat.max'           => 'Maksimal 255 karakter!',
        ]);
        $pengaturan = PengaturanSurat::find($id);
        abort_if(!$pengaturan, 400, 'Pengaturan Tidak Terdaftar');
        
        $ttds = DataPerangkatPemerintah::find($request->is_ttd);
        abort_if(!$ttds, 400, 'Perangkat Pemerintah Tidak Terdaftar');

        $pengaturan->judul_surat   = $request->judul_surat;
        $pengaturan->kode_surat    = $request->kode_surat;
        $pengaturan->nomor_surat   = $request->nomor_surat;
        $pengaturan->jabatan       = $ttds->jabatan;
        $pengaturan->nama_ttd      = $ttds->nama;
        $pengaturan->is_ttd        = $ttds->id;
        $pengaturan->save();

        return redirect()->route('app.admin.pengaturan.surat.surat')->withSuccess('Data Pengaturan Surat Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $pengaturan = PengaturanSurat::find($id);
        abort_if(!$pengaturan, 400, 'Pengaturan Tidak Terdaftar');

        $pengaturan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengaturan Berhasil Dihapus!.',
        ]); 
    }


}
