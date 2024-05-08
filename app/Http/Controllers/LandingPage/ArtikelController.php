<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $desa       = Desa::find(1);
        $kategori   = KategoriArtikel::get();
        $article    = Artikel::active()->orderBy('tgl_posting','desc')->latest()->take(6)->get();
        return view("landing-page.artikel.list_artikel", compact('desa','kategori','article'));
    }
    public function artikel(Request $request, $category, $slug)
    {
        $kategori   = KategoriArtikel::where('nama', str_replace('-', ' ', $category))->first();
        abort_if(!$kategori, 400, 'Kategori Tidak Terdaftar');

        $article    = Artikel::where('kategori_id',$kategori->id)->where('slug', $slug)->first();
        abort_if(!$article, 400, 'Artikel Tidak Terdaftar');
        
        $desa       = Desa::find(1);

        return view("landing-page.artikel.artikel", compact('desa', 'article'));
    }
    public function showByCategory(Request $request, $slug)
    {
        $kategori   = KategoriArtikel::where('slug', $slug)->first();
        abort_if(!$kategori, 400, 'Kategori Tidak Terdaftar');
        
        $query      = Artikel::active()->orderBy('tgl_posting','desc');
        if($kategori->id=="1")
        {
            $query->latest()->take(6);
        }else{
            $query->where('kategori_id', $kategori->id)->latest()->take(6);
        }

        $article    = $query->get();
        $desa       = Desa::find(1);
        $kategori   = KategoriArtikel::get();
        return view("landing-page.artikel.artikel_bykategori", compact('desa','kategori', 'article'));
    }
}
