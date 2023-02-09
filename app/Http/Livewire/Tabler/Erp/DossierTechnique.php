<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class DossierTechnique extends Component
{
    public $projet_id;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
    }
    public function render()
    {
        return view('livewire.tabler.erp.dossier-technique');
    }
}
