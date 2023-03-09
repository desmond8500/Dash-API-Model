<?php

namespace App\Http\Livewire\Cv;

use App\Models\Interet;
use Livewire\Component;

class Interets extends Component
{
    public $person_id;
    public $nom;

    public function mount($person_id)
    {
        $this->person_id = $person_id;
    }

    public $rules = [
        'nom' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.cv.interets',[
            'interets' => Interet::where('personne_id',$this->person_id)->get()
        ]);
    }

    public function add()
    {
        $this->validate($this->rules);

        Interet::create([
            'personne_id' => $this->person_id,
            'nom' => $this->nom,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete($id)
    {
        $interet = Interet::find($id);
        $interet->delete();
    }
}
