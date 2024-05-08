<?php

namespace App\Enums;

enum StatusPengurus : string
{
    case AKTIF = 'aktif';
    case TIDAKAKTIF = 'tidak_aktif';
    case DEMISIONER = 'demisioner';
}