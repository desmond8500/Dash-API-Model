<?php

namespace App\Http\Livewire\Tabler\Task;

use Livewire\Component;

class TaskProjetList extends Component
{
    public $taches, $task, $projet_id;
    protected $listeners = ['reload'=>'render'];

    public function mount($taches, $projet_id=0)
    {
        $this->taches = $taches;
        $this->projet_id = $projet_id;
    }

    public function render()
    {
        return view('livewire.tabler.task.task-projet-list',[
            'taches' => $this->taches,
            'task' => $this->task,
        ]);
    }

    public function getTask($task_id)
    {
        // $this->task = Task::find($task_id);
        // $this->render();
        $this->task = 1;
    }


}
