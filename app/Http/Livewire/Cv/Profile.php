<?php

namespace App\Http\Livewire\Cv;

use App\Models\Personne;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $person_id, $photo;
    public $prenom, $nom, $fonction, $email, $adresse, $tel, $profile, $date;
    public $info1, $info2, $info3;

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
        $this->info1 = $personne->info1;
        $this->info2 = $personne->info2;
        $this->info3 = $personne->info3;
        $this->date = $personne->date;

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
        $personne->info1 = $this->info1;
        $personne->info2 = $this->info2;
        $personne->info3 = $this->info3;
        $personne->date = $this->date;

        $dir = "cv/$personne->id/logo";

        if ($this->photo) {
            $name = $this->photo->getClientOriginalName();
            $this->photo->storeAS("public/$dir", $name);
            $personne->photo = "storage/$dir/$name";
        }

        $personne->save();

        $this->dispatchBrowserEvent('close-modal');
    }
}
