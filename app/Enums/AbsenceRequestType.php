<?php

namespace App\Enums;

enum AbsenceRequestType: string
{
    case Permit = 'permit';
    case Sick = 'sick';
    case Leave = 'leave';
}
