<?php

namespace App\Exports;

use App\Models\KeteranganKelahiran;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SuratKelahiranExport implements FromView
{
    public function view(): View
    {
        $query      = KeteranganKelahiran::orderBy('tgl_surat','asc');
        $startdate  = date('Y-m') . '-01';
        $enddate    = date('Y-m-d');

        if( request()->has('startdate'))
        {
            $startdate =  request()->input('startdate');
        }
        if( request()->has('enddate'))
        {
            $enddate =  request()->input('enddate');
        }
        $surats = $query->whereBetween(\DB::RAW('date(tgl_surat)'), [$startdate, $enddate])->get();
        return view('admin.layanan_umum.sk_kelahiran.export',compact('surats'));
    }
}
