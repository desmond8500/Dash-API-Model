<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class ContactList extends Component
{
    public $projet, $search;
    public $projet_id, $devis_id, $devis;
    public $firstname, $lastname, $description, $avatar;


    protected $listeners = ['reload' => 'render'];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
    }

    public function render()
    {
        return view('livewire.tabler.erp.contact-list');
    }
}
