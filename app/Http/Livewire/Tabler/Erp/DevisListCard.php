<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class DevisListCard extends Component
{
    public $devisList;

    public function mount($devis)
    {
        $this->devisList = $devis;
    }
    public function render()
    {
        return view('livewire.tabler.erp.devis-list-card',[
            'devisList' => $this->devisList,
        ]);
    }
}
