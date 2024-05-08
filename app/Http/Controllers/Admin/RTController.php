<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dusun;
use App\Models\RW;
use App\Models\RT;

class RTController extends Controller
{
    public function rt(Request $request)
    {
        $dusun      = Dusun::all();
        $query      = RT::orderBy('rw','asc');
        if($request->has('dusun_id') && !empty($request->input('dusun_id')))
        {
            $query->where('dusun_id','=', $request->dusun_id);
        }
        $rts = $query->get();
        return view('admin.pengaturan.rt.index', compact('rts','dusun'));
    }

    public function create()
    {
        $rws    = RW::all();
        $dusun  = Dusun::all();
        return view('admin.pengaturan.rt.create', compact('rws','dusun'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nomor'       => 'required|max:255',
            'rw_id'       => 'required',
            'dusun_id'    => 'required',
           
        ],[
            'nomor.required'      => 'Nama dusun harus diisi!',
            'rw_id.required'      => 'Rw wajib dipilih!',
            'dusun_id.required'   => 'Dusun wajib dipilih!',
            'nomor.max'           => 'Maksimal 255 karakter!',
        ]);

        $rws = RW::find($request->rw_id);
        abort_if(!$rws, 400, 'RW Tidak Terdaftar');
        
        $dusun = Dusun::find($request->dusun_id);
        abort_if(!$rts, 400, 'Dusun Tidak Terdaftar');

        RT::create([
            'nomor'     => $request->nomor,
            'rw_id'     => $request->rw_id,
            'rw'        => $rws->nomor,
            'dusun_id'  => $request->dusun_id,
            'dusun'     => $dusun->nama_dusun,
        ]);

        return redirect()->route('app.admin.pengaturan.rt.rt')->withSuccess('RT Berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $rts = RT::find($id);
        abort_if(!$rts, 400, 'RT Tidak Terdaftar');
        
        $rws = RW::all();
        abort_if(!$rws, 400, 'RW Tidak Terdaftar');
        
        $dusun = Dusun::all();
        abort_if(!$rts, 400, 'Dusun Tidak Terdaftar');

        return view('admin.pengaturan.rt.edit', compact('rts','rws','dusun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor'       => 'required|max:255',
           
        ],[
            'nomor.required'      => 'Nama dusun harus diisi!',
            'nomor.max'           => 'Maksimal 255 karakter!',
        ]);
        $rts = RT::find($id);
        abort_if(!$rts, 400, 'RT Tidak Terdaftar');

        $rws = RW::find($request->rw_id);
        abort_if(!$rws, 400, 'RW Tidak Terdaftar');
        
        $dusun = Dusun::find($request->dusun_id);
        abort_if(!$rts, 400, 'Dusun Tidak Terdaftar');

        $rts->nomor      = $request->nomor;
        $rts->rw_id      = $request->rw_id;
        $rts->rw         = $rws->nomor;
        $rts->dusun_id   = $request->dusun_id;
        $rts->dusun      = $dusun->nama_dusun;
        $rts->save();

        return redirect()->route('app.admin.pengaturan.rt.rt')->withSuccess('Data RT Berhasil di Perbaharui!');
    }

    public function remove($id)
    {
        $rts = RT::find($id);
        abort_if(!$rts, 400, 'RT Tidak Terdaftar');

        $rts->delete();

        return response()->json([
            'success' => true,
            'message' => 'RT Berhasil Dihapus!.',
        ]); 
    }
}
