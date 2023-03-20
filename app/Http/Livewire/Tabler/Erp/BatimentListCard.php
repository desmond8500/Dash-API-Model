<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building;
use App\Models\Projet;
use Livewire\Component;

class BatimentListCard extends Component
{
    public $projet, $projet_id;
    public $building_id, $name, $description;

    protected $rules = [
        'name' => 'required'
    ];

    protected $validationAttributes = [
        'name' => 'Le champ nom est requis',
    ];

    protected $listeners = ['reload' => 'render'];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);

    }

    public function render()
    {
        return view('livewire.tabler.erp.batiment-list-card',[
            'buildings' => $this->projet->buildings,
        ]);
    }

    public function gotoBuilding($building_id)
    {
        return redirect()->route('tabler.building',['building_id'=>$building_id]);
    }

    public function edit_building($building_id)
    {
        $this->building_id = $building_id;
        $building = Building::find($building_id);

        $this->name = $building->name;
        $this->description = $building->description;
    }
    public function update_building()
    {
        $this->validate($this->rules);
        $building = Building::find($this->building_id);

        $building->name = $this->name;
        $building->description = $this->description;
        $building->save();
        $this->reset('building_id');
        $this->render();
    }
}
