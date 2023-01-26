<?php

namespace App\Http\Livewire\Pages;

use App\Models\Personne as ModelsPersonne;
use Livewire\Component;

class Personne extends Component
{
    public $person;

    public function mount($id)
    {
        $this->person = ModelsPersonne::find($id);
    }

    public function render()
    {
        return view('livewire.pages.personne',[

        ])->extends('app.layout')->section('content');
    }
}
