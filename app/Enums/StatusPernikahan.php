<?php

namespace App\Enums;

enum StatusPernikahan: string
{
    case KAWIN = 'kawin';
    case BELUMKAWIN = 'belum_kawin';
    case JANDA = 'janda';
    case DUDA = 'duda';
}
