<?php

namespace App\Http\Livewire\Tabler\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];

    public $task, $task_toggle = 1, $search = '', $breadcrumbs;

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Taches', 'route' => route('tabler.tasks')),
        );
    }

    public function render()
    {
        return view('livewire.tabler.task.tasks',[
            'taches' => $this->getTasks(),
            'tachesPrioritaires' => Task::orderBy('priority_id', 'DESC')->where('status_id', 6)->paginate(7),
        ])->extends('app.layout')->section('content');
    }

    public function getTasks()
    {
        if ($this->task_toggle) {
            return Task::orderBy('priority_id', 'DESC')->where('status_id', [1, 2, 3, 6])->paginate(7);
        } else {
            return Task::where('status_id', [4, 5])->orderBy('priority_id', 'DESC')->paginate(7);
        }
    }

    public function show($task)
    {
        $this->task = $task;
    }
}
