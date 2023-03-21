<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\System;
use Livewire\Component;

class SystemAdd extends Component
{
    public $projet_id;
    public $invoice_id, $name, $description;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
    }

    public function render()
    {
        return view('livewire.tabler.erp.system-add');
    }

    public function add_system()
    {
        $this->validate($this->rules);
        System::firstOrCreate([
            'projet_id' => $this->projet_id,
            'invoice_id' => $this->invoice_id ?? 0,
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->reset('name', 'description');

        $this->dispatchBrowserEvent('close-modal');
    }
}
