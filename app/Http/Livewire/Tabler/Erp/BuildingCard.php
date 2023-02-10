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
            'stage' => $this->getStages()
        ]);
    }

    public function getStages()
    {
        return Stage::find($this->stage_id);
    }

    public function roomAdd()
    {
        Room::create([
            'stage_id' => $this->stage_id,
            'name' => ucfirst($this->name),
            'description' => ucfirst($this->description),
        ]);
        $this->getStages();
    }

    public function roomUp($room_id)
    {
        $room1 = Room::find($room_id);
        $room1->order++;
        $room1->save();
    }

    public function roomDown($room_id)
    {
        $room1 = Room::find($room_id);
        $room1->order--;
        $room1->save();
    }

    public $debut, $fin;
    public function generateRooms()
    {
        for ($i= $this->debut; $i <= $this->fin; $i++) {
            Room::create([
                'stage_id' => $this->stage_id,
                'name' => ucfirst($this->name).$i,
                'description' => ucfirst($this->description),
            ]);

        }
    }

    public function setRoomName()
    {
        $this->name = '102-1';
    }
}
