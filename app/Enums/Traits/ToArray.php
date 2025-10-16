<?php

namespace App\Enums\Traits;

trait ToArray
{
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
