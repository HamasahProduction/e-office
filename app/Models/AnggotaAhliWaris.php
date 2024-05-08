<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnggotaAhliWaris extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='anggota_ahli_waris';
    protected $fillable = [
        'id_ahli_waris',
        'nik',
        'nama',
        'ttl',
        'alamat',
    ];
    public function pewaris()
    {
        return $this->belongsTo(SuratKeteranganAhliWaris::class, 'id_ahli_waris');
    }
}
