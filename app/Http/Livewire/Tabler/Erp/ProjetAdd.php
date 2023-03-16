<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Projet;
use Livewire\Component;

class ProjetAdd extends Component
{
    public $client_id;
    public $name, $description, $logo, $status;

    public function mount($client_id)
    {
        $this->client_id = $client_id;
    }

    protected $rules = [
        'name' => 'required'
    ];

    public function render()
    {
        return view('livewire.tabler.erp.projet-add');
    }

    public function store_client()
    {
        $this->validate($this->rules);

        Projet::create([
            'client_id' => $this->client_id,
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
        ]);
        $this->reset('name', 'description');
        $this->emit('reload');
        $this->dispatchBrowserEvent('close-modal');
    }
}
