<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Invoice;
use Livewire\Component;

class Devis extends Component
{
    public $devis;
    public $breadcrumbs;

    public function mount($devis_id)
    {
        $this->devis = Invoice::find($devis_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            // array('name' => $this->devis->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->projet->client->id])),
            array('name' => $this->devis->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->devis->projet->client->id])),
            array('name' => $this->devis->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->devis->projet->id])),
            array('name' => 'Devis', 'route' => null),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.devis',[
            'devis' => $this->devis,
        ])->extends('app.layout')->section('content');;
    }
}
