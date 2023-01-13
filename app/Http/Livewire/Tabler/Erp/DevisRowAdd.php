<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class DevisRowAdd extends Component
{
    public $article_id, $invoice_id;
    public $reference, $quantity, $coef, $priority ;
    public $section_id;


    public function render()
    {
        return view('livewire.tabler.erp.devis-row-add');
    }
}
