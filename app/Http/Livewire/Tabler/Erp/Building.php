<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building as ModelsBuilding;
use Livewire\Component;

class Building extends Component
{
    public $building;
    public $building_id, $name, $description;

    // protected $listeners = ['reload' => 'devis'];

    public function mount($building_id)
    {
        $this->building_id = $building_id;
        $this->building = ModelsBuilding::find($building_id);
    }

    public function render()
    {
        return view('livewire.tabler.erp.building',[
            'building' => $this->building,
        ]);
    }
}
