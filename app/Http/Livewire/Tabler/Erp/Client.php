<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client as ModelsClient;
use App\Models\Projet;
use Livewire\Component;

class Client extends Component
{
    public $client_id, $client;
    public $edit=false;

    public $breadcrumbs;

    protected $listeners = ['reload' => 'render'];

    public function mount($client_id)
    {
        $this->client_id = $client_id;
        $this->client = ModelsClient::find($client_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->client->name, 'route' => route('tabler.client',['client_id' => $client_id])),
        );
    }

    protected $rules = ['name'=>'required'];

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

    public function gotoProjet($projet_id)
    {
        return redirect()->route('tabler.projet', ["projet_id" => $projet_id]);
    }

    public function update()
    {
        $this->validate($this->rules);

        $this->client->name = $this->name;
        $this->client->decription = $this->decription;
        $this->client->save();
        $this->reset('edit');
    }
}
