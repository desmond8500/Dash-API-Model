<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client;
use Livewire\Component;

class ClientAdd extends Component
{
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

    public function render()
    {
        return view('livewire.tabler.erp.client-add');
    }

    public function store_client(){

        Client::create([
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            'address' => $this->address,
            // 'status' => $this->status,
        ]);
        $this->emit('clientReload');

    }
}
