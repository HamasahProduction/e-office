<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SuratKeteranganAhliWaris extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_ahli_waris';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nama_pewaris',
        'alamat_pewaris',
        'ketua_rt',
        'ketua_rw',
        'tgl_surat',
        'is_cetak',
    ];

    public function anggotaPindah()
    {
        return $this->hasMany(AnggotaAhliWaris::class,'id_ahli_waris');
    }
}

