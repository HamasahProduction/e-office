<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class DaftarSurat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='daftar_surat';
    protected $fillable = [
        'nama_surat',
        'jenis_surat',
        'kode_surat',
        'no_urut_surat',
        'penerbit',
        'url',
        'is_active',
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', 1);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_active', 0);
    }
}
