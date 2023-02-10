<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public static function getStatus()
    {
        return [
            ['id'=> 1, 'name'=> 'Nouveau'],
            ['id'=> 2, 'name'=> 'En Cours'],
            ['id'=> 3, 'name'=> 'En Pause'],
            ['id'=> 4, 'name'=> 'Terminé'],
            ['id'=> 5, 'name'=> 'Annulé'],
        ];
    }
    public static function getPriotity()
    {
        return [
            ['id'=> 1, 'name'=> 'Basse'],
            ['id'=> 2, 'name'=> 'Moyenne'],
            ['id'=> 3, 'name'=> 'Haute'],
        ];
    }
}
