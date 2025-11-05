<?php

namespace App\Dto\Traits;

use Illuminate\Support\Str;

trait ToModelArray
{
    public function toModelArray(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $key => $value) {
            $data[Str::snake($key)] = $value;
        }

        return $data;
    }
}
