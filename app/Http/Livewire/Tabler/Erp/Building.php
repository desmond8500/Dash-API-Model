<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building as ModelsBuilding;
use Livewire\Component;

class Building extends Component
{
    public $building;
    public $building_id, $name, $description, $breadcrumbs;

    // protected $listeners = ['reload' => 'devis'];

    public function mount($building_id)
    {
        $this->building_id = $building_id;
        $this->building = ModelsBuilding::find($building_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->building->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->building->projet->client->id])),
            array('name' => $this->building->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->building->projet->id])),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.building',[
            'building' => $this->building,
        ])->extends('app.layout')->section('content');
    }
}
