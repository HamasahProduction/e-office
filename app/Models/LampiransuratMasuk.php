<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class LampiransuratMasuk extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;
    protected $table ='lampiran_sm';
    protected $fillable = [
        'id_surat',
        'perihal',
        'file',
    ];
    public function Surat()
    {
        return $this->belongsTo(SuratMasuk::class, 'id_surat');
    }
}
