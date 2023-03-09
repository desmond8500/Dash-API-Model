<?php

namespace App\Http\Livewire\Cv;

use App\Models\Personne;
use Livewire\Component;

class Profile extends Component
{
    public $person_id;
    public $prenom, $nom, $fonction, $email, $adresse, $tel, $profile;

    public function mount($person_id)
    {
        $this->person_id = $person_id;
    }

    public $rules = [
        'prenom' => 'required',
        'nom' => 'required',
        'fonction' => 'required',
        'email' => 'required',
        'adresse' => 'required',
        'tel' => 'required',
        'profile' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.cv.profile',[
            'person' => Personne::find($this->person_id),
        ]);
    }

    public function edit()
    {
        $personne = Personne::find($this->person_id);

        $this->prenom = $personne->prenom;
        $this->nom = $personne->nom;
        $this->fonction = $personne->fonction;
        $this->email = $personne->email;
        $this->adresse = $personne->adresse;
        $this->tel = $personne->tel;
        $this->profile = $personne->profile;

        $this->dispatchBrowserEvent('open-modal');
    }

    public function update()
    {
        $personne = Personne::find($this->person_id);

        $this->validate($this->rules);

        $personne->prenom = $this->prenom;
        $personne->nom = $this->nom;
        $personne->fonction = $this->fonction;
        $personne->email = $this->email;
        $personne->adresse = $this->adresse;
        $personne->tel = $this->tel;
        $personne->profile = $this->profile;
        $personne->save();

        $this->dispatchBrowserEvent('close-modal');
    }
}
