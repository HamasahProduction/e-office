<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeluar extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='surat_keluar';
    protected $fillable = [
        'nomor_surat',
        'nama_instansi_dituju',
        'perihal',
        'tgl_surat',
        'tgl_pengiriman',
        'deskripsi_surat',
        'file'
    ];
}

