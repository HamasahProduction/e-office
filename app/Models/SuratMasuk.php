<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratMasuk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='surat_masuk';
    protected $fillable = [
        'nomor_surat',
        'nama_instansi_pengirim',
        'perihal',
        'tgl_surat',
        'tgl_surat_masuk',
        'deskripsi_surat',
        'file'
    ];

    public function lampiran()
    {
        return $this->hasOne(LampiransuratMasuk::class,  'id_surat');
    }

}
