<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    /**
     * Conversion de text pour la centrale d'alarme galaxy dimension
     * @param string $name
     * @return integer
     */

    public static function convert($name)
    {

        $name = str_replace('é','e', $name);
        $name = str_replace('è','e', $name);
        $name = str_replace('ë','e', $name);
        $name = str_replace('ê','e', $name);
        $name = str_replace('à','a', $name);
        $name = str_replace('â','a', $name);
        $name = str_replace('ä','a', $name);
        $name = str_replace('î','i', $name);
        $name = str_replace('ï','i', $name);
        $name = str_replace('ù','u', $name);
        $name = str_replace('ô','o', $name);
        $name = str_replace('ö','o', $name);
        $name = str_replace('ç','c', $name);
        $name = str_replace('ÿ','y', $name);

        $array = str_split(strtoupper($name));
        $result = [];
        foreach ($array as $value) {
            if ($value == "A")
                array_push($result, 13);
            else if ($value == "B")
                array_push($result, 15);
            else if ($value == "C")
                array_push($result, 16);
            else if ($value == "D")
                array_push($result, 17);
            else if ($value == "E")
                array_push($result, 18);
            else if ($value == "F")
                array_push($result, 19);
            else if ($value == "G")
                array_push($result, 20);
            else if ($value == "H")
                array_push($result, 22);
            else if ($value == "I")
                array_push($result, 23);
            else if ($value == "J")
                array_push($result, 24);
            else if ($value == "K")
                array_push($result, 25);
            else if ($value == "L")
                array_push($result, 26);
            else if ($value == "M")
                array_push($result, 27);
            else if ($value == "N")
                array_push($result, 28);
            else if ($value == "O")
                array_push($result, 31);
            else if ($value == "P")
                array_push($result, 33);
            else if ($value == "Q")
                array_push($result, 34);
            else if ($value == "R")
                array_push($result, 35);
            else if ($value == "S")
                array_push($result, 36);
            else if ($value == "T")
                array_push($result, 37);
            else if ($value == "U")
                array_push($result, 38);
            else if ($value == "V")
                array_push($result, 40);
            else if ($value == "W")
                array_push($result, 41);
            else if ($value == "X")
                array_push($result, 42);
            else if ($value == "Y")
                array_push($result, 44);
            else if ($value == "Z")
                array_push($result, 45);
            else if ($value == " ")
                array_push($result, 21);

            else if ($value == "0")
                array_push($result, 0);
            else if ($value == "1")
                array_push($result, 1);
            else if ($value == "2")
                array_push($result, 2);
            else if ($value == "3")
                array_push($result, 3);
            else if ($value == "4")
                array_push($result, 4);
            else if ($value == "5")
                array_push($result, 5);
            else if ($value == "6")
                array_push($result, 6);
            else if ($value == "7")
                array_push($result, 7);
            else if ($value == "8")
                array_push($result, 8);
            else if ($value == "9")
                array_push($result, 9);

            else
                array_push($result, $value);
        }

        return $result;
    }
}
