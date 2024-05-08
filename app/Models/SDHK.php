<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SDHK extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sdhk';
    protected $fillable = [
        'keterangan',
    ];
}
