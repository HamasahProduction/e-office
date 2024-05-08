<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKepindahan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='jenis_kepindahan';
    protected $fillable = [
        'keterangan',
    ];
}
