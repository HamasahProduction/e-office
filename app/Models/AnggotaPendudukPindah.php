<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnggotaPendudukPindah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='anggota_penduduk_pindah';
    protected $fillable = [
        'nik',
        'id_kepindahan',
        'nama',
        'kode_sdhk',
    ];

    public function kepindahan()
    {
        return $this->belongsTo(PendudukPindahDatang::class, 'id_kepindahan');
    }
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
}
