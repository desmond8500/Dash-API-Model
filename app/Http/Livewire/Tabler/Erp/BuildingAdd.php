<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building;
use App\Models\Projet;
use Livewire\Component;

class BuildingAdd extends Component
{
    public $projet;
    public $projet_id, $name, $description;

    protected $rules = [
        'name' => 'required'
    ];

    protected $validationAttributes = [
        'name' => 'Le champ nom est requis',
    ];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
    }

    public function render()
    {
        return view('livewire.tabler.erp.building-add');
    }

    public function add_building()
    {
        $this->validate($this->rules);

        Building::create([
            'projet_id' => $this->projet_id,
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->emit('reload');
        $this->dispatchBrowserEvent('close-modal');
    }
}
