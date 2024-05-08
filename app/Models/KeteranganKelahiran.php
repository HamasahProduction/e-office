<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeteranganKelahiran extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_kelahiran';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik',
        'nik_kk',
        'nik_ayah',
        'nik_ibu',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
    public function ayah()
    {
        return $this->belongsTo(Penduduk::class, 'nik_ayah');
    }
    public function ibu()
    {
        return $this->belongsTo(Penduduk::class, 'nik_ibu');
    }

}
