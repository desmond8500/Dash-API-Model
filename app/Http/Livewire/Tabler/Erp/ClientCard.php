<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class ClientCard extends Component
{
    public $client;

    public function mount($client)
    {
        $this->client = $client;
    }
    public function render()
    {
        return view('livewire.tabler.erp.client-card');
    }

    function gotoProjets(int $client_id)
    {
        return redirect()->route('tabler.client', ['client_id' => $client_id]);
    }
}
