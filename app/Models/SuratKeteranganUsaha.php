<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeteranganUsaha extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_usaha';
    protected $hashKey = 'id';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nama_usaha',
        'nik',
        'nama_pemohon',
        'jenis_kelamin',
        'pekerjaan',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
}
