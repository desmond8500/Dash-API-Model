<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Projet extends Component
{
    public $projet_id;

    public function mount($projet_id){
        $this->projet_id = $projet_id;

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->projet->client->id])),
            array('name' => $this->projet->name, 'route' => route('tabler.projet', ['client_id' => $this->projet->id])),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.projet',[
            'projet_id' => $this->projet_id,
        ])->extends('app.layout')->section('content');
    }
}
