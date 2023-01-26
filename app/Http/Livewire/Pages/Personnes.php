<?php

namespace App\Http\Livewire\Pages;

use App\Models\Personne;
use Livewire\Component;

class Personnes extends Component
{
    public function render()
    {
        return view('livewire.pages.personnes',[
            'personnes' => $this->get_people(),
        ])->extends('app.layout')->section('content');
    }

    public function get_people()
    {
        return Personne::all();
    }
}
