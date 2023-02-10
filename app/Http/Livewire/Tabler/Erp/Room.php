<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Room as ModelsRoom;
use App\Models\Task;
use Livewire\Component;

class Room extends Component
{
    public $room, $breadcrumbs;
    public $room_id, $name, $order, $description;

    protected $listeners = ['reload' => 'render'];

    public function mount($room_id)
    {
        $this->room_id = $room_id;
        $this->room = ModelsRoom::find($room_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->room->stage->building->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->room->stage->building->projet->client->id])),
            array('name' => $this->room->stage->building->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->room->stage->building->projet->id])),
            array('name' => $this->room->stage->building->name, 'route' => route('tabler.building', ['building_id' => $this->room->stage->building->id])),
            array('name' => $this->room->name, 'route' => route('tabler.room', ['room_id' => $this->room->id])),
        );
    }
    public function render()
    {
        return view('livewire.tabler.erp.room',[
            'room' => $this->room,
            'taches' => Task::where('room_id', $this->room_id)->get(),
        ])->extends('app.layout')->section('content');
    }
}
