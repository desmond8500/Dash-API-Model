<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Invoice;
use App\Models\Projet;
use Livewire\Component;

class DevisListCard extends Component
{
    public $projet;
    public $projet_id;

    protected $listeners = ['reload' => 'devis'];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
    }

    public function render()
    {
        return view('livewire.tabler.erp.devis-list-card',[
            'projet_id' => $this->projet_id,
            'projet' => $this->projet,
            'devisList' => $this->projet->invoices,
        ]);
    }

    public function getProjets()
    {
        return Projet::find($this->projet_id);
    }
    public function deleteInvoice($id)
    {
        $devis = Invoice::find($id);
        // if ($devis->rows->count()) {
        //     session()->flash('message', 'Ce devis contient des articles');
        // } else {
            $devis->delete();
            $this->render();
        // }

    }
}
