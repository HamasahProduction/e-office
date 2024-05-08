<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananUmumController extends Controller
{
    public function index()
    {
        return view('admin.layanan_umum.sk_usaha.index');
    }

    public function skTempatUsaha()
    {
        return view('admin.layanan_umum.sk_tempat_usaha.index');
    }

    public function skTidakMampuSekolah()
    {
        return view('admin.layanan_umum.sk_tidak_mampu_sekolah.index');
    }
    public function skTidakMampuUmum()
    {
        return view('admin.layanan_umum.sk_tidak_mampu_umum.index');
    }
}
