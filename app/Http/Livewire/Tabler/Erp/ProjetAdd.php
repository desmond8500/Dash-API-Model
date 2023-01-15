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

    public function render()
    {
        return view('livewire.tabler.erp.projet-add');
    }

    public function store_client()
    {

        Projet::create([
            'client_id' => $this->client_id,
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            // 'status' => $this->status,
        ]);
        $this->emit('projetReload');
    }
}
