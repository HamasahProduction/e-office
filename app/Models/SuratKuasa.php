<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKuasa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='surat_kuasa';
    protected $fillable = [
        'nama_ahli_waris',
        'nik_anggota_ahli_waris',
        'nik_penerima_kuasa',
        'keterangan',
        'status',
        'tgl_surat',
        'is_cetak',
        'note',
    ];

    public function ahliWaris()
    {
        return $this->belongsTo(Penduduk::class, 'nik_anggota_ahli_waris');
    }
    public function penerimaKuasa()
    {
        return $this->belongsTo(Penduduk::class, 'nik_penerima_kuasa');
    }
}
