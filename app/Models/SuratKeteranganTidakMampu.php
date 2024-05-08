<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeteranganTidakMampu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_tidak_mampu_sekolah';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik',
        'nama_pemohon',
        'jenis_kelamin',
        'nama_sekolah',
        'kelas',
        'tempat_lahir',
        'tgl_lahir',
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
