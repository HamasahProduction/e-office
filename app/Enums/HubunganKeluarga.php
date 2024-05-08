<?php

namespace App\Enums;

enum HubunganKeluarga : string
{
    case KEPALAKELUARGA = 'kepala_keluarga';
    case ISTRI = 'istri';
    case ANAK = 'anak';
    case MENANTU = 'menantu';
    case ORANGTUA = 'orangtua';
    case CUCU = 'cucu';
    case SUAMI = 'suami';
}