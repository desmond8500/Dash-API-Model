<?php

namespace App\Http\Livewire\Tabler;

use App\Http\Controllers\ScrapperController;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';
    public $lien;
    public $task_toggle=1;

    public function render()
    {
        return view('livewire.tabler.index',[
            'users' => User::all(),
            'test' => $this->scrapper(),
            'taches' => $this->getTasks()
        ])->extends('app.layout')->section('content');
    }

    public function getTasks()
    {
        if ($this->task_toggle) {
            return Task::orderBy('priority_id', 'DESC')->where('status_id', [1, 2, 3])->paginate(7);
        } else {
            return Task::where('status_id', [4, 5])->orderBy('priority_id', 'DESC')->paginate(7);
        }

    }


    public function scrapper()
    {
        $data = null;

        if ($this->lien) {
            $data = ScrapperController::orbita($this->lien);
        }

        if ($data) {
            return (object) [
                'url'           => $data->url,
                'title'         => $data->title,
                'site_name'     => $data->site_name,
                'description'   => $data->description,
                'image'         => $data->image,
                'price'         => $data->price,
                'devise'        => $data->devise,
                'marque'        => $data->marque,
                'reference'     => $data->reference,
                'prix'          => $data->prix,
            ];
        } else {
            return (object) [
                'url'           => 0,
                'title'         => "ret",
                'site_name'     => "ret",
                'description'   => "ret",
                'image'         => "ret",
                'price'         => "ret",
                'devise'        => "ret",
                'marque'        => "ret",
                'reference'     => "ret",
                'prix'          => "ret",
            ];
        }


    }
}
