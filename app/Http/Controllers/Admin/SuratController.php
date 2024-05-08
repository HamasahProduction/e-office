<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarSurat;

class SuratController extends Controller
{
    public function index()
    {
        return view('admin.pengaturan.surat.index');
    }
    public function create()
    {
        return view('admin.pengaturan.surat.create');
    }
    public function suratMasuk()
    {
        return view('admin.surat.surat_masuk.index');
    }

    public function createSuratMasuk()
    {
        return view('admin.surat.surat_masuk.create');
    }

    public function suratKeluar()
    {
        return view('admin.surat.surat_keluar.index');
    }

    
    public function daftarSurat()
    {
        $daftarSurat = DaftarSurat::all();
        return view('admin.layanan_umum.daftar_surat', compact('daftarSurat'));
    }
}
