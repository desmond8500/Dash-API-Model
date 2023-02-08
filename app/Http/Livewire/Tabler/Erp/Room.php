<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Room as ModelsRoom;
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
            array('name' => $this->building->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->building->projet->client->id])),
            array('name' => $this->building->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->building->projet->id])),
        );
    }
    public function render()
    {
        return view('livewire.tabler.erp.room',[
            'room' => $this->room,
        ]);
    }
}
