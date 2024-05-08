<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeteranganPenghasilan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_penghasilan';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik_ortu',
        'nik_anak',
        
        'penghasilan',
        'note',
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];

    public function orangTua()
    {
        return $this->belongsTo(Penduduk::class, 'nik_ortu');
    }
    public function anak()
    {
        return $this->belongsTo(Penduduk::class, 'nik_anak');
    }
}
