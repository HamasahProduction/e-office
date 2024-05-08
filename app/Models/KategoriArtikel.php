<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriArtikel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='kategori_artikel';
    protected $fillable = [
        'nama',
        'slug',
    ];

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
}
