<?php

namespace App\Enums;

enum AbsenceRequestStatus: string
{
    case Pending = 'pending';
    case Canceled = 'canceled';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
