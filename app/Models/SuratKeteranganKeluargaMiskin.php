<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeteranganKeluargaMiskin extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sk_keluarga_miskin';
    protected $fillable = [
        'nomor_surat',
        'no_urut_surat',
        'nik',
        'nama_pemohon',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'warganegara',

        'nik_keperluan',
        'nama_keperluan',
        'nama_orang_keperluan',
        'jenis_kelamin_keperluan',
        'tempat_lahir_keperluan',
        'tgl_lahir_keperluan',
        
        'tgl_surat',
        'is_cetak',
        'note_response',
    ];
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik');
    }
}
