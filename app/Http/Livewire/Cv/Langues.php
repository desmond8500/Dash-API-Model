<?php

namespace App\Http\Livewire\Cv;

use App\Models\Langue;
use Livewire\Component;

class Langues extends Component
{
    public $person_id;
    public $nom, $niveau=0;

    public function mount($person_id)
    {
        $this->person_id = $person_id;
    }

    public $rules = [
        'nom' => 'required',
        'niveau' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.cv.langues',[
            'langues' => Langue::where('personne_id', $this->person_id)->get()
        ])->extends('app.layout')->section('content');
    }

    public function add()
    {
        $this->validate($this->rules);

        Langue::create([
            'personne_id'=> $this->person_id,
            'nom'=> $this->nom,
            'niveau'=> $this->niveau,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete($id)
    {
        $langue = Langue::find($id);
        $langue->delete();
    }
}
