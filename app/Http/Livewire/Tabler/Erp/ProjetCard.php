<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class ProjetCard extends Component
{
    public $projet;
    public $name, $description;

    public function mount($projet)
    {
        $this->projet = $projet;
        $this->name = $projet->name;
        $this->description = $projet->description;
    }

    public function render()
    {
        return view('livewire.tabler.erp.projet-card',[
            'projet' => $this->projet,
        ]);
    }

    public function updateProjet()
    {
        $this->projet->name = $this->name;
        $this->projet->description = $this->description;
        $this->projet->save();
        $this->emitUp('reload');
    }
}
