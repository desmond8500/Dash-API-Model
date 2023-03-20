<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public static function valid($debut, $fin)
    {
        $mydate = date_format($debut, 'd');

        $carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);

        if ($mydate >= $carbon->startOfWeek()->day - 7 && $mydate >= $carbon->startOfWeek()->day + 6) {
            return true;
        }else{
            return false;
        }
    }
}
