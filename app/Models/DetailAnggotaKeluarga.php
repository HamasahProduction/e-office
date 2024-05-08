<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailAnggotaKeluarga extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='detail_anggota_keluargas';
    protected $fillable = [
        'nik',
        'id_kepala_keluarga',
        'id_sdhk',
        'nama_ayah',
        'nama_ibu',
    ];

    public function kepalaKeluarga()
    {
        return $this->belongsTo(kepalaKeluarga::class, 'id_kepala_keluarga');
    }
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
    public function SDHK()
    {
        return $this->belongsTo(SDHK::class, 'id_sdhk');
    }
}
