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
    public $task_toggle = 1;

    protected $listeners = ['reload'=>'render'];

    public function mount( $projet_id=0)
    {
        $this->projet_id = $projet_id;
    }

    public function render()
    {
        return view('livewire.tabler.task.task-projet-list',[
            'taches' => $this->getTasks(),
            'task' => $this->task,
        ]);
    }

    public function getTasks()
    {
        if ($this->task_toggle) {
            return Task::where('projet_id', $this->projet_id)->orderBy('priority_id', 'DESC')->where('status_id', [1, 2, 3])->paginate(7);
        } else {
            return Task::where('projet_id', $this->projet_id)->where('status_id', [4, 5])->orderBy('priority_id', 'DESC')->paginate(7);
        }
    }


}
