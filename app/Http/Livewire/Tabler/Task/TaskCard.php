<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Http\Controllers\MainController;
use Livewire\Component;

class TaskCard extends Component
{
    public $tache;
    public $objet, $description, $status_id = 1, $priority_id = 1;
    public $statut = [], $priorite = [];

    public function mount($tache)
    {
        $this->tache = $tache;
        $this->statut = MainController::getStatus();
        $this->priorite = MainController::getPriotity();

        $this->objet = $this->tache->objet;
        $this->description = $this->tache->description;
        $this->status_id = $this->tache->status_id;
        $this->priority_id = $this->tache->priority_id;
    }

    public function render()
    {
        return view('livewire.tabler.task.task-card');
    }

    public function taskUpdate()
    {
        $this->tache->objet = $this->objet;
        $this->tache->description = $this->description;
        $this->tache->status_id = $this->status_id;
        $this->tache->priority_id = $this->priority_id;
        // $this->tache->room_id = $this->room_id;
        // $this->tache->stage_id = $this->room->stage->id;
        // $this->tache->building_id = $this->room->stage->building->id;
        // $this->tache->projet_id = $this->room->stage->building->projet->id;
        $this->tache->save();

        $this->emit('reload');
    }

    public function selectTask()
    {
        $this->emitUp('getTask', $this->tache->id);
    }
}
