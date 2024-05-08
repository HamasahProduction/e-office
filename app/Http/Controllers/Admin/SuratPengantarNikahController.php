<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratPengantarNikahController extends Controller
{
    public function index()
    {
        return view('admin.layanan_nikah.pengantar_nikah.index');
    }

    public function ketPernahNikah()
    {
        return view('admin.layanan_nikah.ket_pernah_nikah.index');
    }
    public function ketBelumPernahNikah()
    {
        return view('admin.layanan_nikah.ket_belum_nikah.index');
    }
    public function ketDudaJanda()
    {
        return view('admin.layanan_nikah.ket_duda_janda.index');
    }
}
