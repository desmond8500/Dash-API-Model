<?php

namespace App\Http\Livewire\Tabler\Tools;

use Livewire\Component;

class GalalyNames extends Component
{
    public $breadcrumbs;
    public $name;

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Tools', 'route' => route('tabler.tools')),
        );
    }
    public function render()
    {
        return view('livewire.tabler.tools.galaly-names',[
            'result' => $this->convert(),
        ])->extends('app.layout')->section('content');
    }

    public function convert()
    {
        $array = str_split(strtoupper($this->name));
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
        }

        return $result;
        // return $array;
        // return $this->name;
    }
}
