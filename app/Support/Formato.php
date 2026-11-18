<?php

namespace App\Support;

class Formato
{
    public static function n(float $x, int $decimales = 2): string
    {
        return number_format($x, $decimales, ',', '.');
    }
}