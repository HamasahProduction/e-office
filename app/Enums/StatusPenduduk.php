<?php

namespace App\Enums;

enum StatusPenduduk: string
{
    case TETAP = 'tetap';
    case TIDAKTETAP = 'tidak_tetap';
    case PENDATANG = 'pendatang';
}
