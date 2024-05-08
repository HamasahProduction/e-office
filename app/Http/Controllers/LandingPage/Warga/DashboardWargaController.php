<?php

namespace App\Http\Controllers\LandingPage\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\SuratKeteranganUsaha;
use App\Models\PermohonanAdministrasiWarga;
use Auth;

class DashboardWargaController extends Controller
{
    public function index(Request $request)
    {
        $desa       = Desa::find(1);
        $user       = Penduduk::where('nik', Auth::user()->username)->first();
        $query      = PermohonanAdministrasiWarga::where('nik', Auth::user()->username);
        $view       = $request->view;
        if(empty($view))
        {
            $permohonan = $query->latest()->take(10)->get();
        }
        if($view =='menunggu_proses')
        {
            $permohonan = $query->where('status','menunggu_proses')->get();
        }
        if($view =='siap_diambil')
        {
            $permohonan = $query->where('status','siap_diambil')->get();
        }
        if($view =='sudah_diambil')
        {
            $permohonan = $query->where('status','sudah_diambil')->get();
        }
        if($view =='dibatalkan')
        {
            $permohonan = $query->where('status','dibatalkan')->get();
        }
        return view('landing-page.dashboard_warga.index', compact('desa','user','permohonan'));
    }

    public function update($id)
    {
        $data       = PermohonanAdministrasiWarga::find($id);
        abort_if(!$data, 400, 'Data Permohonan tidak ditemukan!');
        $data->status = 'dibatalkan';
        $data->save();
        
        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Permohonan Berhasil dibatalkan!',
            'data'      => $data  
        ]);
    }

}
