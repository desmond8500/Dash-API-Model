<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Invoice;
use App\Models\Projet;
use Livewire\Component;

class DevisListCard extends Component
{
    public $projet, $search;
    public $projet_id, $devis_id, $devis;
    public $reference, $description, $status = 1;
    public $client_name, $client_tel, $client_address;
    public $discount, $tva, $brs;

    protected $listeners = ['reload' => 'render'];

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
            'devisList' => $this->getDevis(),
        ]);
    }

    public function getDevis()
    {
        if ($this->search) {
            return Invoice::where('description', 'LIKE', "%{$this->search}%") ->paginate(10);
        } else {
            return Invoice::where('projet_id', $this->projet_id)->paginate(10);
        }
    }

    public function resetSearch()
    {
        $this->reset('search') ;
        $this->getDevis();
    }

    public function gotoDevis($devis_id)
    {
        return redirect()->route('tabler.devis',['devis_id'=>$devis_id]);
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
