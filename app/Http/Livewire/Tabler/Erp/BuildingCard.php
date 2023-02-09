<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Room;
use App\Models\Stage;
use Livewire\Component;

class BuildingCard extends Component
{
    public $stage, $stage_id;
    public $name, $description;

    public function mount($stage_id)
    {
        $this->stage = Stage::find($stage_id);
        $this->stage_id = $stage_id;
    }

    public function render()
    {
        return view('livewire.tabler.erp.building-card',[
            'stage' => $this->stage
        ]);
    }

    public function roomAdd()
    {
        Room::create([
            'stage_id' => $this->stage_id,
            'name' => $this->name,
            'description' => $this->description,
        ]);
    }
}
