<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Invoice;
use App\Models\Projet;
use Livewire\Component;

class DevisAdd extends Component
{
    public $projet_id, $reference, $description, $status = 1;
    public $client_name, $client_tel, $client_address;
    public $discount=0, $tva=0, $brs=0;
    public $projet;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
    }

    public function render()
    {
        return view('livewire.tabler.erp.devis-add',[
            'projet' => $this->projet
        ]);
    }

    protected $rules = [
        'description' => 'required',
        'tva' => 'numeric',
        'brs' => 'numeric',
        'discount' => 'numeric',
        'client_tel' => 'numeric',
    ];

    protected $validationAttributes = [
        'client_tel' => 'Téléphone'
    ];

    public function invoiceAdd()
    {
        $this->validate($this->rules);
        $devis = Invoice::create([
            'projet_id'     => $this->projet_id,
            'reference'     => '',
            'status'        => $this->status,
            'description'   => $this->description,
            'client_name'   => $this->client_name,
            'client_tel'    => $this->client_tel,
            'client_address' => $this->client_address,
            'discount'      => $this->discount ?? 0,
            'tva'           => $this->tva ?? 0,
            'brs'           => $this->brs ?? 0
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $devis->reference = str_pad($devis->id, 3, '0', STR_PAD_LEFT) .'-' . strtoupper(substr($this->projet->name, 0, 3));
        $devis->save();
        $this->emit('reload');
    }
}
