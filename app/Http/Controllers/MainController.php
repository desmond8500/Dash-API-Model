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
    public static function getArticlePriotity()
    {
        return [
            ['id'=> 1,  'name'=> 'Centrale 1'],
            ['id'=> 2,  'name'=> 'Centrale 2'],
            ['id'=> 3,  'name'=> 'Centrale 3'],
            ['id'=> 4,  'name'=> 'Organe 1'],
            ['id'=> 5,  'name'=> 'Organe 2'],
            ['id'=> 6,  'name'=> 'Organe 3'],
            ['id'=> 7,  'name'=> 'Organe 4'],
            ['id'=> 8,  'name'=> 'Organe 5'],
            ['id'=> 9,  'name'=> 'Cable'],
            ['id'=> 10, 'name'=> 'Accessoire 1'],
            ['id'=> 11, 'name'=> 'Accessoire 2'],
            ['id'=> 12, 'name'=> 'Forfait'],
            ['id'=> 13, 'name'=> 'Main d\'oeuvre'],
        ];
    }
}
