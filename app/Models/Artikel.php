<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Artikel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='artikel';
    protected $fillable = [
        'thumbnail',
        'judul',
        'konten',
        'slug',
        'user',
        'tgl_posting',
        'status_posting',
        'kategori_id',
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('status_posting', 1);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('status_posting', 0);
    }
    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_id');
    }
}
