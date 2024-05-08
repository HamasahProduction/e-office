<?php

namespace App\Enums;

enum StatusPendidikan: string
{
    case TIDAKSEKOLAH = 'tidak_sekolah';
    case SD = 'sd';
    case MI = 'mi';
    case SMP = 'smp';
    case MTS = 'mts';
    case SMA = 'sma';
    case SMK = 'smk';
    case MA = 'ma';
    case S1 = 's1';
    case S2 = 's2';
    case S3 = 's3';
    case SLTP = 'sltp';
    case SLTA = 'slta';
}
