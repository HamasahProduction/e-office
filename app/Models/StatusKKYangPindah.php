<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusKKYangPindah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='status_nokk_bg_yg_pindah';
    protected $fillable = [
        'keterangan',
    ];
}
