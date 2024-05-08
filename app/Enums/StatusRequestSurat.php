<?php

namespace App\Enums;

enum StatusRequestSurat : string
{
    case DIAMBIL = 'diambil';
    case BATAL = 'batal';
    case DIPERIKSA = 'diperiksa';
    case MENUNGGU = 'menunggu';
    case MENUNGGUTTD = 'menunggu_ttd';
    case SIAPDIAMBIL = 'siap_diambil';
    case BELUMLENGKAP = 'belum_lengkap';
}