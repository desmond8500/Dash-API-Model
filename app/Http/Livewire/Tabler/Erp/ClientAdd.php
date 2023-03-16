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

    protected $validationAttributes = [
        'name' => 'nom'
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
        $client = Client::create([
            'name' => ucfirst($this->name),
            'description' => ucfirst($this->description),
            'address' => ucfirst($this->address),
            // 'status' => $this->status,
        ]);

        if ($this->logo) {
            $dir = "erp/client/$client->id";
            $name = $this->logo->getClientOriginalName();
            $this->logo->storeAS("public/$dir", $name);

            $client->logo = "storage/$dir/$name";
            $client->save();
        }

        $this->emit('reload');
        session()->flash('message', 'Le client a été créé avec succès');
        $this->dispatchBrowserEvent('close-modal');
    }
}
