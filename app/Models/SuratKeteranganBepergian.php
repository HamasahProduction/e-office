<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeteranganBepergian extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_bepergian';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik',
        'kepentingan',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
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
}
