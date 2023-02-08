<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building;
use App\Models\Projet;
use Livewire\Component;

class BatimentListCard extends Component
{
    public $projet, $projet_id;

    // protected $listeners = ['reload' => 'devis'];

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

    public function buildingAdd()
    {
        Building::create([
            'projet_id' => $this->projet_id,
            'name' => $this->name,
            'description' => $this->description,
        ]);
    }
    public function gotoBuilding($building_id)
    {
        return redirect()->route('tabler.building',['building'=>$building_id]);
    }
}
