<?php

namespace App\Enums\User;

use App\Enums\Traits\ToArray;

enum UserRoles: string
{
    use ToArray;
    case Admin = 'admin';
    case Vendor = 'vendor';
    case DeliveryPartner = 'partner';
    case Customer = 'customer';
}
