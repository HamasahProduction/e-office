<?php

namespace App\Enums;

enum StatusAnggotaKeluarga : string
{
    case KEPALA = 'kepala';
    case ISTRI = 'istri';
    case ANAK = 'anak';
    case ANGGOTA = 'anggota';
}