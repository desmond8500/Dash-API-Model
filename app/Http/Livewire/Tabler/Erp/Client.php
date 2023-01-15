<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client as ModelsClient;
use App\Models\Projet;
use Livewire\Component;

class Client extends Component
{
    public $client_id;
    public $client;

    public $breadcrumbs;

    protected $listeners = ['projetReload' => 'getProjets'];

    public function mount($client_id)
    {
        $this->client_id = $client_id;
        $this->client = ModelsClient::find($client_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->client->name, 'route' => route('tabler.client',['client_id' => $client_id])),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.client',[
            'breadcrumbs' => $this->breadcrumbs,
            'client' => $this->client,
            'projets' => $this->getProjets(),
        ])->extends('app.layout')->section('content');
    }

    public function getProjets()
    {
        return Projet::where('client_id', $this->client_id)->get();
    }

    public function gotoProjet(int $projet_id)
    {
        return redirect()->route('tabler.projet', ['projet_id' => $projet_id]);
    }
}
