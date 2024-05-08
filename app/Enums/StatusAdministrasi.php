<?php

namespace App\Enums;

enum StatusAdministrasi : string
{
    case BERLAKU = 'dicabut';
    case DICABUT = 'berlaku';
}