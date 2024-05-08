<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\PendudukPindahDatang;

class SuratPindahDatangExport implements FromView
{
    public function view(): View
    {
        $query      = PendudukPindahDatang::orderBy('rencana_tgl_pindah','asc');
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
        $surats = $query->whereBetween(\DB::RAW('date(rencana_tgl_pindah)'), [$startdate, $enddate])->get();
        return view('admin.layanan_umum.sk_pindah_datang.export',compact('surats'));
    }
}
