<?php

namespace App\Enums;

enum UserRole: string
{
    case Superadmin = 'superadmin';
    case Admin = 'admin';
    case Warga = 'warga';
    case Penulis = 'penulis';
    
    case Administrator = 'administrator';
    case Artikel = 'artikel';

    case Representative = 'representative';
    case Agent = 'agent';
}