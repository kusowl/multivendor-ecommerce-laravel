<?php

namespace App\Utils;

class TitleBuilder
{
    protected $parts = [];

    public function add($part)
    {
        $this->parts[] = $part;

        return $this;
    }

    public function build($separator = ' - ')
    {
        $this->parts[] = config('app.name');

        return implode($separator, $this->parts);
    }
}
