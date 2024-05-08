<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class DataPerangkatPemerintah extends Model
{
    use SoftDeletes;
    protected $table ='data_perangkat_pemerintah';
    protected $fillable = [
        'nip' ,
        'nama' ,
        'jabatan',
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
