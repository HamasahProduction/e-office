<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KlasifikasiPindah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='klasifikasi_pindah';
    protected $fillable = [
        'keterangan',
    ];
}
