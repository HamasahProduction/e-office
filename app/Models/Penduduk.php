<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Penduduk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='penduduks';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik',
        'no_kk',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'id_pendidikan',
        'id_status_perkawinan',
        'id_pekerjaan',
        'id_sdhk',
        'nama_ayah',
        'nama_ibu' ,
        'alamat',
        'rt_id',
        'province_id',
        'regency_id' ,
        'district_id',
        'village_id' ,
        'status_penduduk' ,
        'kewarganegaraan',
        'is_live',
        'is_mutasi',
        'is_kepala_keluarga',
        'is_keluarga',
        'user_id'
    ];

    public function Pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan');
    }
    public function StatusPerkawinan()
    {
        return $this->belongsTo(StatusPerkawinan::class, 'id_status_perkawinan');
    }
    public function Pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan');
    }
    public function SDHK()
    {
        return $this->belongsTo(SDHK::class, 'id_sdhk');
    }
    public function Rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_live', 1);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_live', 0);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
   
}
