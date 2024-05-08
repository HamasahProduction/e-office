<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKematianBaru extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_kematian_baru';
    protected $fillable = [
        'nik',
        'nama',
        'jk',
        'tempat_lahir',
        'tgl_lahir',
        'umur',
        'agama',
        'pekerjaan',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kewarganegaraan',
        'keturunan',
        'kebangsaan',
        'anak_ke',
        'tgl_kematian',
        'waktu_kematian',
        'sebab_kematian',
        'yang_menerengkan',

        'nomor_surat',
        'no_urut_surat',
        'tgl_surat',
        'is_cetak',
    ];
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
}
