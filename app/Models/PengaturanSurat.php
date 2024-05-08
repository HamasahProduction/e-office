<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PengaturanSurat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='pengaturan_surat';
    protected $fillable = [
        'judul_surat',
        'kode_surat',
        'nomor_surat',
        'jabatan',
        'nama_ttd',
        'is_ttd',
    ];
}
