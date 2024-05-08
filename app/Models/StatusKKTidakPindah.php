<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusKKTidakPindah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='status_nokk_yg_tdk_pindah';
    protected $fillable = [
        'keterangan',
    ];
}
