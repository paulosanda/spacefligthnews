<?php

namespace App\Http\Traits;

trait ReplaceArrayKey
{
    public static function array_replace_key(&$arr, $old, $new, $overwrite = true): bool
    {
        if(isset($arr[$new]) and !$overwrite) {
            return false;
        }

        $arr[$new] = $arr[$old];
        unset($arr[$old]);

        return true;
    }
}