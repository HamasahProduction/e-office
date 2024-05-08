<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use Auth;


class LayananUmumController extends Controller
{
   
    public function layanan()
    {
        $desa       = Desa::find(1);
        $surat      = DaftarSurat::where('jenis_surat','publik')->get();
        if (!Auth::check()) {
            return redirect()->route('login-client');
        }else{
            $account    = Penduduk::with('user')->where('user_id', Auth::user()->id)->first();
        }
        
        return view("landing-page.layanan_umum.dashboard_layanan_umum", compact('desa','surat','account'));
    }
}
