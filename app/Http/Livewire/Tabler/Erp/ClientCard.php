<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client;
use FontLib\Table\Type\name;
use Livewire\Component;

class ClientCard extends Component
{
    public $client;
    public $name, $description, $logo, $address, $status;

    protected $rules = [
        'name' => 'required',
        'description' => 'string',
        'logo' => 'string',
        'address' => 'string',
        'status' => 'string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($client)
    {
        $this->client = $client;
        $this->name = $client->name;
        $this->description = $client->description;
        $this->logo = $client->logo;
        $this->address = $client->address;
    }
    public function render()
    {
        return view('livewire.tabler.erp.client-card');
    }

    function gotoProjets(int $client_id)
    {
        return redirect()->route('tabler.client', ['client_id' => $client_id]);
    }

    public function update_client()
    {
        $client = Client::find($this->client->id);

        $client->name = $this->name;
        $client->description = $this->description;
        $client->logo = $this->logo;
        $client->address = $this->address;

        $client->save();
        $this->emit('clientReload');
    }
}
