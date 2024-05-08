<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PermohonanAdministrasiWarga extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='permohonan_administrasi_warga';
    protected $fillable = [
        'code_register',
        'nik',
        'nama_pemohon',
        'jenis_surat',
        'tgl_permohonan',
        'url_slug',
        'status',
        'kontak',

        'keterangan',
        'pekerjaan',
        'kelas',
        'nama_usaha',
        'nama_sekolah',
        'nik_peruntukan',
        'nik_orangtua',
        'penghasilan',
    ];

    public function pemohon()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
    public function peruntukan()
    {
        return $this->belongsTo(Penduduk::class, 'nik_peruntukan');
    }
    public function orangtua()
    {
        return $this->belongsTo(Penduduk::class, 'nik_orangtua');
    }
}

