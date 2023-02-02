<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Invoice;
use App\Models\Projet as ModelsProjet;
use Livewire\Component;

class Projet extends Component
{
    public $projet;
    public $tab = 1;

    public $breadcrumbs;

    public function mount($projet_id)
    {
        $this->projet = ModelsProjet::find($projet_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->projet->client->id])),
            array('name' => $this->projet->name, 'route' => route('tabler.projet', ['client_id' => $this->projet->id])),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.projet',[
            'projet' => $this->projet,
            // 'client' => $this->projet->client->name,
            'devis' => Invoice::where('projet_id', $this->projet->id)->get(),
        ])->extends('app.layout')->section('content');
    }

    public function selectTab(int $tab)
    {
        $this->tab = $tab;
    }
}
