<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Provider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Providers extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';
    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Stock', 'route' => route('tabler.stock')),
            // array('name' => $this->room->stage->building->projet->client->name, 'route' => route('tabler.client', ['client_id' => this->room->stage->building->projet->client->id])),

        );
    }
    public function render()
    {
        return view('livewire.tabler.stock.providers',[
            'providers' => Provider::all()
        ])->extends('app.layout')->section('content');
    }
}
