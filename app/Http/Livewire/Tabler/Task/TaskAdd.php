<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Http\Controllers\MainController;
use App\Models\Room;
use App\Models\Task;
use Livewire\Component;

class TaskAdd extends Component
{
    public $room_id, $room;
    public $objet, $description, $status_id = 1, $priority_id = 1;
    public $statut = [], $priorite=[];

    public function mount($room_id)
    {
        $this->room = Room::find($room_id);
        $this->statut = MainController::getStatus();
        $this->priorite = MainController::getPriotity();
    }

    public function render()
    {
        return view('livewire.tabler.task.task-add');
    }

    public function taskAdd()
    {
        Task::firstOrCreate([
            'objet' => $this->objet,
            'description' => $this->description,
            'status_id' => $this->status_id,
            'priority_id' => $this->priority_id,
            'room_id' => $this->room_id,
            'stage_id' => $this->room->stage->id,
            'building_id' => $this->room->stage->building->id,
            'projet_id' => $this->room->stage->building->projet->id,
        ]);
        $this->emit('reload');
    }
}
