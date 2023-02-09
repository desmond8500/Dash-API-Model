<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building as ModelsBuilding;
use Livewire\Component;

class Building extends Component
{
    public $building;
    public $building_id, $name, $description, $breadcrumbs;

    protected $listeners = ['reload' => 'render'];

    public function mount($building_id)
    {
        $this->building_id = $building_id;
        $this->building = ModelsBuilding::find($building_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->building->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->building->projet->client->id])),
            array('name' => $this->building->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->building->projet->id])),
            array('name' => $this->building->name, 'route' => route('tabler.building', ['building_id' => $this->building->id])),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.building',[
            'building' => $this->building,
        ])->extends('app.layout')->section('content');
    }

    public function gotoRoom($room_id)
    {
        return redirect()->route('tabler.room',['room_id'=>$room_id]);
    }
}
