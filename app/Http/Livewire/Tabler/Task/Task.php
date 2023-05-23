<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Http\Controllers\MainController;
use App\Models\Task as ModelsTask;
use App\Models\TaskPhoto;
use Illuminate\Support\Facades\Storage;
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
    public $debut, $fin;

    public $form_photo = 0, $photos;

    public function mount($task_id)
    {
        $this->task_id = $task_id;
        $this->task = ModelsTask::find($task_id);

        $this->objet = $this->task->objet;
        $this->description = $this->task->description;
        $this->status_id = $this->task->status_id;
        $this->priority_id = $this->task->priority_id;
        if ($this->task->debut) {
            $this->debut = date_format($this->task->debut, 'Y-m-d');
        }
        if ($this->task->fin) {
            $this->fin = date_format($this->task->fin, 'Y-m-d');
        }

        $this->statut = MainController::getStatus();
        $this->priorite = MainController::getPriotity();

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
        );

        array_push( $this->breadcrumbs, array('name' => $this->task->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->task->projet->client->id])));
        array_push( $this->breadcrumbs, array('name' => $this->task->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->task->projet_id])));
        if ($this->task->room_id) {
            array_push( $this->breadcrumbs, array('name' => $this->task->building->name, 'route' => route('tabler.building', ['building_id' => $this->task->building_id])));
            array_push( $this->breadcrumbs, array('name' => $this->task->room->name, 'route' => route('tabler.room', ['room_id' => $this->task->room_id])));
        }
        array_push( $this->breadcrumbs, array('name' => 'Tache', 'route' => route('tabler.task', ['task_id' => $this->task->id])) );

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
        $this->task->debut = $this->debut;
        $this->task->fin = $this->fin;
        $this->task->save();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function add_photos()
    {
        $dir = "task/$this->task_id";

        if ($this->photos) {
            foreach ($this->photos as $key => $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAS("public/$dir", $name);

                TaskPhoto::firstOrCreate([
                    'task_id' => $this->task->id,
                    'name' => $name,
                    'folder' => "storage/$dir/$name",
                ]);
            }
        }
        $this->form_photo = 0;
        $this->render();
    }
}
