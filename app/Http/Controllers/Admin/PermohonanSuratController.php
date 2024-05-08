<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermohonanAdministrasiWarga;
use Carbon\Carbon;

class PermohonanSuratController extends Controller
{
    public function index(Request $request)
    {
        $start      = $request->start==null?Carbon::now()->format('Y-m-d') : $request->start;
        $finish     = $request->finish==null?Carbon::now()->format('Y-m-d') : $request->finish;
        $permohonan = PermohonanAdministrasiWarga::get();
        return view('admin.permohonan_surat.index', compact('start','finish','permohonan'));
    }

   public function updateStatus(Request $request, $id)
   {
        $permohonan = PermohonanAdministrasiWarga::find($id);
        abort_if(!$permohonan, 400, 'Permohonan Surat Tidak Terdaftar');

        $permohonan->status = $request->status;
        $permohonan->save();

        return response()->json([
            'success' => true,
            'icon'    =>'success',
            'message' => 'status permohonan berhasil diperbaharui!',
            'data'    => $permohonan  
        ]);
   }
}
