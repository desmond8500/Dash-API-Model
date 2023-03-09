<?php

namespace App\Http\Livewire\Cv;

use App\Models\Experience;
use Livewire\Component;

class Experiences extends Component
{
    public $person_id;
    public $pays, $ville, $debut, $fin, $entreprise;

    public function mount($person_id)
    {
        $this->person_id = $person_id;
    }

    public $rules = [
        'pays' => 'required',
        'ville' => 'required',
        'debut' => 'required',
        'fin' => 'required',
        'entreprise' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.cv.experiences',[
            'experiences' => Experience::where('personne_id', $this->person_id)->get()
        ]);
    }

    public function add()
    {
        $this->validate($this->rules);

        Experience::create([
            'personne_id' => $this->person_id,
            'pays' => $this->pays,
            'ville' => $this->ville,
            'debut' => $this->debut,
            'fin' => $this->fin,
            'entreprise' => $this->entreprise,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete($id)
    {
        $interet = Experience::find($id);
        $interet->delete();
    }
}
