<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratKematianBaru;
use Carbon\Carbon;

class SuratKeteranganKematianBaruController extends Controller
{
    public function index(Request $request)
    {
        $tgl_surat  = $request->tgl_surat==null?Carbon::now()->format('Y-m-d') : $request->tgl_surat;
        $query      = SuratKematianBaru::orderBy('tgl_surat','desc');
        if($request->has('tgl_surat') && !empty($request->input('tgl_surat')))
        {
            $query->whereDate('tgl_surat','=', $request->tgl_surat);
        }
        $skbm = $query->get();
        return view('admin.layanan_umum.sk_kematian_baru.index', compact('skbm','tgl_surat','request'));
    }
    public function create()
    {
        $penduduks = Penduduk::active()->where('is_mutasi', false)->get();
        return view('admin.layanan_umum.sk_kematian_baru.create', compact('penduduks'));
    }
}
