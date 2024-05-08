<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\DaftarSurat;
use App\Models\Dokumentasi;

class FrontPageController extends Controller
{
    public function index()
    {
        $desa           = Desa::find(1);
        $penduduk       = Penduduk::count();
        $priaCount      = Penduduk::where('jenis_kelamin','L')->count();
        $perempuanCount = Penduduk::where('jenis_kelamin','P')->count();
        return view("landing-page.index",compact('desa','penduduk','priaCount','perempuanCount'));
    }
    public function about()
    {
        $desa = Desa::find(1);
        return view("landing-page.about", compact('desa'));
    }
    public function dokumentasi()
    {
        setlocale(LC_TIME, 'id_ID');
        $desa           = Desa::find(1);
        $dokumentasi    = Dokumentasi::active()->latest()->take(9)->orderBy('created_at','desc')->get();
        return view("landing-page.gallery", compact('desa','dokumentasi'));
    }
    public function administrasi()
    {
        $desa = Desa::find(1);
        return view("landing-page.administrasi.dashboard_administrasi", compact('desa'));
    }
    public function administrasiUmum()
    {
        $desa = Desa::find(1);
        return view("landing-page.administrasi.administrasi_umum", compact('desa'));
    }
    public function administrasiPenduduk()
    {
        $desa = Desa::find(1);
        return view("landing-page.administrasi.administrasi_penduduk", compact('desa'));
    }
    public function administrasiKelembagaan()
    {
        $desa = Desa::find(1);
        return view("landing-page.administrasi.administrasi_kelembagaan", compact('desa'));
    }
    
    public function layananNikah()
    {
        $desa = Desa::find(1);
        return view("landing-page.layanan_nikah.pengantar_nikah", compact('desa'));
    }
    public function layananNikahPernahNikah()
    {
        $desa = Desa::find(1);
        return view("landing-page.layanan_nikah.sk_pernah_nikah", compact('desa'));
    }
    public function layananNikahDudaJanda()
    {
        $desa = Desa::find(1);
        return view("landing-page.layanan_nikah.sk_duda_janda", compact('desa'));
    }
}
