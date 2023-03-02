<?php

namespace App\Http\Livewire\Tabler;

use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\TablerIconsController;
use App\Models\Article;
use App\Models\Client;
use App\Models\Projet;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['getTask' => 'show'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';
    public $lien, $task;
    public $task_toggle=1;

    public $cards = [];

    public function mount()
    {
        array_push($this->cards,
        array(
            'route' => 'tabler.clients',
            'title' => 'Clients',
            'details' => 'Page des clients',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path> <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path> <path d="M16 3.13a4 4 0 0 1 0 7.75"></path> <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path> </svg>',
            'count' => Client::all()->count(),
        ),
        array(
            'route' => null,
            'title' => 'Projets',
            'details' => 'Projets',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path> <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path> <path d="M12 12l0 .01"></path> <path d="M3 13a20 20 0 0 0 18 0"></path> </svg>',
            'count' => Projet::all()->count(),
        ),
        array(
            'route' => 'tabler.tasks',
            'title' => 'Taches',
            'details' => 'Taches à traiter',
            'icon' => ' <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path> <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path> <path d="M9 12l.01 0"></path> <path d="M13 12l2 0"></path> <path d="M9 16l.01 0"></path> <path d="M13 16l2 0"></path> </svg> ',
            'count' => Task::where('status_id', [1, 2, 3, 6])->count(),
        ),
        array(
            'route' => 'tabler.articles',
            'title' => 'Articles',
            'details' => 'Articles du stock',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path> <path d="M2 13.5v5.5l5 3"></path> <path d="M7 16.545l5 -3.03"></path> <path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path> <path d="M12 19l5 3"></path> <path d="M17 16.5l5 -3"></path> <path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5"></path> <path d="M7 5.03v5.455"></path> <path d="M12 8l5 -3"></path> </svg>',
            'count' => Article::all()->count(),
        ),
    );

    }

    public function render()
    {
        return view('livewire.tabler.index',[
            'users' => User::all(),
            'test' => $this->scrapper(),
            'taches' => $this->getTasks(),
            'tachesPrioritaires' => Task::orderBy('priority_id', 'DESC')->where('status_id', 6)->paginate(7),
            'cards' => $this->cards,
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
