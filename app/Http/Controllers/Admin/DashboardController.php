<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lembaga;
use App\Models\Penduduk;
use App\Models\KepalaKeluarga;
use App\Models\SuratMasuk;
use App\Models\PermohonanAdministrasiWarga;

class DashboardController extends Controller
{
    public function index()
    {
        $lembagaActiveCount    = Lembaga::active()->count();
        $lembagaInactiveCount  = Lembaga::inactive()->count();
        $lembagas              = Lembaga::get();
        
        $pendudukCount         = Penduduk::count();
        $pendudukPria          = Penduduk::where('jenis_kelamin','L')->count();
        $pendudukWanita        = Penduduk::where('jenis_kelamin','P')->count();
        $kepalaKeluarga        = KepalaKeluarga::count();

        $suratMasuk            = SuratMasuk::latest()->take(10)->get();

        $permohonanAdministrasi= PermohonanAdministrasiWarga::latest()->take(10)->get();
        return view('admin.dashboard', compact('lembagaInactiveCount','lembagaActiveCount','lembagas','pendudukCount','pendudukPria','pendudukWanita','kepalaKeluarga','permohonanAdministrasi','suratMasuk'));
    }
}
