<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKematianLama extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_kematian_lama';
    protected $fillable = [
        'nik',
        'nama',
        'umur',
        'hari_meninggal',
        'tgl_meninggal',
        'lokasi_meninggal',
        'penyebab_meninggal',

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
