<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class ProjetCard extends Component
{
    public $projet, $edit=false;
    public $name, $description;

    public function mount($projet)
    {
        $this->projet = $projet;
        $this->name = $projet->name;
        $this->description = $projet->description;
    }

    protected $rules = [
        'name' => 'required'
    ];

    public function render()
    {
        return view('livewire.tabler.erp.projet-card',[
            'projet' => $this->projet,
        ]);
    }

    public function updateProjet()
    {
        $this->validate($this->rules);

        $this->projet->name = $this->name;
        $this->projet->description = $this->description;
        $this->projet->save();

        $this->reset('edit');
    }
}
