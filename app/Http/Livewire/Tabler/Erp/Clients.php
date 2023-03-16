<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;
    public $breadcrumbs;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';

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
        if ($this->search) {
            return Client::where('name', 'LIKE', "%{$this->search}%")->paginate(20);
        } else {
            return Client::paginate(20);
        }
    }

    public function resetSearch()
    {
        $this->reset('search');
        $this->getClients();
    }
}
