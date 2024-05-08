<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KepalaKeluarga extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='kepala_keluargas';
    protected $fillable = [
        'nik',
        'no_kk',
        'nama_ayah',
        'nama_ibu',
        'jumlah_anggota',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }

    public function anggotaKeluargas()
    {
        return $this->hasMany(DetailAnggotaKeluarga::class, 'id_kepala_keluarga');
    }
}
