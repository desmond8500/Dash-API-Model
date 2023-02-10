<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Models\Task;
use Livewire\Component;

class TaskProjetList extends Component
{
    public $taches, $task;
    protected $listeners = ['reload'=>'render','getTask'];

    public function mount($taches)
    {
        $this->taches = $taches;
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
        $this->task = Task::find($task_id);
    }
}
