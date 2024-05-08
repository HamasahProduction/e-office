<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganDomisili extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_domisili';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik',
        'alamat',
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
}
