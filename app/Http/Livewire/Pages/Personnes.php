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

    public $prenom, $nom, $fonction, $email, $adresse, $tel, $profile;

    public function store_person()
    {
        Personne::create([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'fonction' => $this->fonction,
            'email' => $this->email,
            'adresse' => $this->adresse,
            'tel' => $this->tel,
            'profile' => $this->profile,
        ]);

        $this->get_people();
    }
}
