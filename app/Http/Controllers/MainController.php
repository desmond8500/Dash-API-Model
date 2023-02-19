<?php

namespace App\Http\Controllers;

use App\Models\Achat;

class MainController extends Controller
{
    public static function getStatus($id=null)
    {
        $enum =  [
            ['id'=> 1, 'name'=> 'Nouveau'],
            ['id'=> 2, 'name'=> 'En Cours'],
            ['id'=> 3, 'name'=> 'En Pause'],
            ['id'=> 4, 'name'=> 'Terminé'],
            ['id'=> 5, 'name'=> 'Annulé'],
            ['id'=> 6, 'name'=> 'Prioriser'],
        ];

        if ($id) {
            return $enum[$id]['name'];
        } else {
            return $enum;
        }
    }

    public static function getPriotity($id=null)
    {
        $enum =[
            ['id' => 1, 'name' => 'Basse'],
            ['id' => 2, 'name' => 'Moyenne'],
            ['id' => 3, 'name' => 'Haute'],
        ];

        if ($id) {
            return $enum[$id]['name'];
        } else {
            return $enum;
        }
    }

    public static function getArticlePriotity($id = null)
    {
        $enum = [
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

        if ($id) {
            return $enum[$id]['name'];
        } else {
            return $enum;
        }
    }

    public static function getDocType($id = null){
        $enum = [
            [ 'id' => 0, "name" => "Image"],
            [ 'id' => 1, "name" => "Fiche Technique"],
            [ 'id' => 2, "name" => "Manuel d'installation"],
            [ 'id' => 3, "name" => "Manuel de programmation"],
            [ 'id' => 4, "name" => "Manuel d'utilisation"],
            [ 'id' => 5, "name" => "Autre"],
        ];

        if ($id) {
            return $enum[$id]['name'];
        } else {
            return $enum;
        }
    }
    public static function reportType($id = null){
        $enum = [
            [ 'id' => 1, "name" => "Rapport de visite"],
            [ 'id' => 0, "name" => "Rapport d'intervention"],
            [ 'id' => 0, "name" => "Image"],
            [ 'id' => 0, "name" => "Image"],
        ];

        if ($id) {
            return $enum[$id]['name'];
        } else {
            return $enum;
        }
    }
    public static function getType($id=null){
        $enum = [
            [ 'id' => 0, "name" => "Image"],
            [ 'id' => 1, "name" => "Fiche Technique"],
            [ 'id' => 2, "name" => "Manuel d'installation"],
            [ 'id' => 3, "name" => "Manuel de programmation"],
            [ 'id' => 4, "name" => "Manuel d'utilisation"],
            [ 'id' => 5, "name" => "Autre"],
        ];

        if ($id) {
            return $enum[$id]['name'];
        } else {
            return 'Autre';
        }
    }

    public static function total_Achat($id){
        $achat = Achat::find($id);
        $total = 0;
        foreach ($achat->articles as $key => $article_row) {
            $total += $article_row->quantity * $article_row->price;
        }

        return $total;
    }
}
