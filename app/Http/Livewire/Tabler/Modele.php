<?php

namespace App\Http\Livewire\Tabler;

use Livewire\Component;

class Modele extends Component
{
    public $test = 0;
    public $name, $select, $description;

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function updated($propertyName)

    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.tabler.modele',[

        ])->extends('app.layout')->section('content');
    }

    public function add_modele()
    {
        $validatedData = $this->validate();
        $this->test++;
    }

}
