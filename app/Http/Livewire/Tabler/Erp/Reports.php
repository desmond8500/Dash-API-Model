<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Report;
use Livewire\Component;

class Reports extends Component
{
    public $projet_id;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
    }
    public function render()
    {
        return view('livewire.tabler.erp.reports',[
            'reports' => Report::where('projet_id', $this->projet_id)->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
