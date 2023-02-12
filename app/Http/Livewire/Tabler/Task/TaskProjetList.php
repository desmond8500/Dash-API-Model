<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TaskProjetList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';

    public $task, $projet_id;
    protected $listeners = ['reload'=>'render'];

    public function mount( $projet_id=0)
    {
        $this->projet_id = $projet_id;
    }

    public function render()
    {
        return view('livewire.tabler.task.task-projet-list',[
            'taches' => Task::where('projet_id', $this->projet_id)->paginate(7),
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
