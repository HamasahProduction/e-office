<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class PengurusLembaga extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='pengurus_lembaga';
    protected $fillable = [
        'nik',
        'lembaga_id',
        'jabatan_id',
        'tgl_pengangkatan',
        'tgl_pemberhentian',
        'is_active',
    ];


    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(JabatanPengurus::class, 'jabatan_id');
    }


    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', 1);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_active', 0);
    }
}
