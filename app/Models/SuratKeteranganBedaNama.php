<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganBedaNama extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_beda_nama';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik',
        'dokumen_berbeda',
        'dokumen_berbeda_lainya',
        'perbedaan_nama',
        'perbedaan_nama_lainya',
        'jumlah_berkas',
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
}
