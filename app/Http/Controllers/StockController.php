<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public $priorities;

    public function __construct()
    {
        $this->priorities = (object) array(
        "Centrale 1"    => 1,
        "Centrale 2"    => 2,
        "Centrale 3"    => 3,
        "Organe 1"      => 4,
        "Organe 2"      => 5,
        "Organe 3"      => 6,
        "Cable 1"       => 7,
        "Cable 2"       => 8,
        "Accessoire 1"  => 9,
        "Accessoire 2"  => 10,
        "Forfait"       => 11,
        );
    }
}
