<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SuratKeluarExport implements FromView
{
    public function view(): View
    {
        
        $query      = SuratKeluar::orderBy('tgl_surat','asc');
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
        return view('admin.surat_keluar.export',compact('surats'));
    }
}
