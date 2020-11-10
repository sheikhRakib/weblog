<?php

namespace App\Libraries;

class C_Data
{
    public static function refine($value) {
        $value = preg_replace('/\s+/', ' ', $value);
        return $value;
    }
}