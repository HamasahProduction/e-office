<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class AlamatController extends Controller
{
    public function index(Request $request)
    {
        $kecamatan  = District::all();
        if(!empty($request->kode))
        {
            $alamat     = Village::where('district_id',$request->kode)->get();
        }else{
            $alamat     = Village::where('district_id','3208071')->get();
        }
        return view('admin.pengaturan.alamat.index', compact('alamat','kecamatan'));
    }
}
