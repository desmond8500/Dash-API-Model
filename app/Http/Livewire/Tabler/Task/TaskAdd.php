<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Http\Controllers\MainController;
use App\Models\Room;
use App\Models\Task;
use Livewire\Component;

class TaskAdd extends Component
{
    public $room_id, $room, $projet_id;
    public $objet, $description, $status_id = 1, $priority_id = 1;
    public $statut = [], $priorite=[];

    public function mount($room_id, $projet_id=0)
    {
        if ($room_id) {
            $this->room = Room::find($room_id);
        }
        if ($projet_id) {
            $this->projet_id = $projet_id;
        }
        $this->statut = MainController::getStatus();
        $this->priorite = MainController::getPriotity();
    }

    public function render()
    {
        return view('livewire.tabler.task.task-add');
    }

    public function taskAdd()
    {
        if ($this->room_id) {
            $room_id = $this->room_id;
            $stage_id = $this->room->stage->id;
            $building_id = $this->room->stage->building->id;
            $projet_id = $this->room->stage->building->projet->id;
        } else {
            $room_id = 0;
            $stage_id = 0;
            $building_id = 0;
            $projet_id = $this->projet_id;
        }


        Task::firstOrCreate([
            'objet' => ucfirst($this->objet),
            'description' => ucfirst($this->description),
            'status_id' => $this->status_id,
            'priority_id' => $this->priority_id,
            'room_id' => $room_id,
            'stage_id' => $stage_id,
            'building_id' => $building_id,
            'projet_id' => $projet_id,
        ]);
        $this->emit('reload');
    }
}
