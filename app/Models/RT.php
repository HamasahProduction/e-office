<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RT extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='rts';
    protected $fillable = [
        'nomor',
        'rw_id',
        'rw',
        'dusun_id',
        'dusun',
    ];

    public function rw()
    {
        return $this->belongsTo(RW::class, 'rw_id');
    }
    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'dusun_id');
    }
}
