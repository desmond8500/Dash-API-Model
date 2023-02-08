<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building;
use App\Models\Stage;
use Livewire\Component;

class LevelAdd extends Component
{
    public $building;
    public $building_id, $name, $order, $description;

    protected $listeners = ['reload' => 'render'];

    public function mount($building_id)
    {
        $this->building_id = $building_id;
        $this->building = Building::find($building_id);
    }

    public function render()
    {
        return view('livewire.tabler.erp.level-add');
    }

    public function stageAdd()
    {
        Stage::create([
            'building_id' => $this->building_id,
            'name' => $this->name,
            'order' => $this->order ?? Stage::count()+1,
            'description' => $this->description,
        ]);

        $this->emit('reload');
    }
}
