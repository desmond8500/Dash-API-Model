<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientAdd extends Component
{
    use WithFileUploads;
    public $name, $description, $logo, $address, $status;

    protected $rules = [
        'name' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules);
    }

    public function render()
    {
        return view('livewire.tabler.erp.client-add');
    }

    public function store_client(){
        $this->validate($this->rules);
        Client::create([
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            'address' => $this->address,
            // 'status' => $this->status,
        ]);
        $this->emit('reload');
        session()->flash('message', 'Le client a été créé avec succès');
        $this->dispatchBrowserEvent('close-modal');
    }
}
