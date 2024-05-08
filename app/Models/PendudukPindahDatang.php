<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendudukPindahDatang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='penduduk_pindah_datang';
    protected $fillable = [
        'nik_pemohon',
        'no_kk',
        'nama_pemohon',
        'nama_kepala_keluarga',
        'dusun_asal',
        'rt_asal',
        'rw_asal',
        'desa_asal',
        'kecamatan_asal',
        'kabupaten_asal',
        'provinsi_asal',
        'kode_pos_asal',
        'no_hp',
        'alasan_pindah_id',
        'dusun_tujuan',
        'rt_tujuan',
        'rw_tujuan',
        'desa_tujuan',
        'kecamatan_tujuan',
        'kabupaten_tujuan',
        'provinsi_tujuan',
        'kode_pos_tujuan',
        'klasifikasi_pindah_id',
        'jenis_kepindahan_id',
        'status_kk_tdk_pindah_id',
        'status_kk_pindah_id',
        'rencana_tgl_pindah',
        
        'status_surat',
        'diketahui_oleh',
        'no_surat',
        'tgl_terbit_surat',
        
        'is_sync_status_penduduk',
    ];

    // public function penduduk()
    // {
    //     return $this->belongsTo(Penduduk::class, 'nik');
    // }
    public function pemohon()
    {
        return $this->belongsTo(Penduduk::class, 'nik_pemohon');
    }
    public function jenisKepindahan()
    {
        return $this->belongsTo(JenisKepindahan::class, 'jenis_kepindahan_id');
    }
    public function klasifikasiPindah()
    {
        return $this->belongsTo(KlasifikasiPindah::class, 'klasifikasi_pindah_id');
    }
    public function alasanPindah()
    {
        return $this->belongsTo(AlasanPindah::class, 'alasan_pindah_id');
    }
    public function statusKKPindah()
    {
        return $this->belongsTo(StatusKKYangPindah::class, 'status_kk_pindah_id');
    }
    public function statusKKTidakPindah()
    {
        return $this->belongsTo(StatusKKTidakPindah::class, 'status_kk_tdk_pindah_id');
    }
    public function provinceAsal()
    {
        return $this->belongsTo(Province::class, 'provinsi_asal', 'id');
    }
    public function regencyAsal()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_asal', 'id');
    }
    public function districtAsal()
    {
        return $this->belongsTo(District::class, 'kecamatan_asal', 'id');
    }
    public function villageAsal()
    {
        return $this->belongsTo(Village::class, 'desa_asal', 'id');
    }
    public function provinceTujuan()
    {
        return $this->belongsTo(Province::class, 'provinsi_tujuan', 'id');
    }
    public function regencyTujuan()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_tujuan', 'id');
    }
    public function districtTujuan()
    {
        return $this->belongsTo(District::class, 'kecamatan_tujuan', 'id');
    }
    public function villageTujuan()
    {
        return $this->belongsTo(Village::class, 'desa_tujuan', 'id');
    }
    public function anggotaPindah()
    {
        return $this->hasMany(AnggotaPendudukPindah::class,'id_kepindahan');
    }
    public function anggota()
    {
        return $this->belongsTo(AnggotaPendudukPindah::class,'id_kepindahan');
    }
}
