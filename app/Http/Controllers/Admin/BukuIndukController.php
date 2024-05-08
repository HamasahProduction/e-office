<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\RT;

class BukuIndukController extends Controller
{
    public function index(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $birthday   = $request->birthday==null?'' : $request->birthday;
        $query      = Penduduk::active();
        if($request->has('birthday') && !empty($request->input('birthday')))
        {
            $query->whereDate('tgl_lahir','=', $request->birthday);
        }
        if($request->has('status') && !empty($request->input('status')))
        {
            $query->where('status_penduduk','=', $request->status);
        }
        if($request->has('rt_id') && !empty($request->input('rt_id')))
        {
            $query->where('rt_id','=', $request->rt_id);
        }
        $penduduks  = $query->get();
        $rts        = RT::with(['rw','dusun'])->get();
        return view('admin.administrasi_penduduk.buku_induk.index', compact('birthday','request','penduduks','rts'));
    }
}
