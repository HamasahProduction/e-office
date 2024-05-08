<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeteranganPendaftaranHaji extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_pendaftaran_haji';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik',
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
}
