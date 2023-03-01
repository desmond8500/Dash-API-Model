<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;
    public $breadcrumbs;

    protected $listeners = ['reload' => 'render'];

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.clients',[
            'breadcrumbs' => $this->breadcrumbs,
            'clients' => $this->getClients(),
        ])->extends('app.layout')->section('content');
    }

    public function getClients()
    {
        return Client::paginate(20);
    }
}
