<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Http\Controllers\MainController;
use App\Models\Task as ModelsTask;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Task extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];

    public $task_id, $task, $breadcrumbs;
    public $objet, $description, $status_id = 1, $priority_id = 1;
    public $statut = [], $priorite = [];

    public function mount($task_id)
    {
        $this->task_id = $task_id;
        $this->task = ModelsTask::find($task_id);

        $this->objet = $this->task->objet;
        $this->description = $this->task->description;
        $this->status_id = $this->task->status_id;
        $this->priority_id = $this->task->priority_id;

        $this->statut = MainController::getStatus();
        $this->priorite = MainController::getPriotity();

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            // array('name' => $this->room->stage->building->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->room->stage->building->projet->client->id])),
            // array('name' => $this->room->stage->building->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->room->stage->building->projet->id])),
            // array('name' => $this->room->stage->building->name, 'route' => route('tabler.building', ['building_id' => $this->room->stage->building->id])),
            // array('name' => $this->room->name, 'route' => route('tabler.room', ['room_id' => $this->room->id])),
        );

    }
    public function render()
    {
        return view('livewire.tabler.task.task',[
            'task' => $this->task,
            'statut' => $this->statut,
            'priorite' => $this->priorite,
        ])->extends('app.layout')->section('content');
    }

    public function updateTask()
    {
        $this->task->objet = $this->objet;
        $this->task->description = $this->description;
        $this->task->status_id = $this->status_id;
        $this->task->priority_id = $this->priority_id;
        $this->task->save();
    }
}
