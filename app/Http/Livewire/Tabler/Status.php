<?php

namespace App\Http\Livewire\Tabler;

use Livewire\Component;

class Status extends Component
{
    public $status_id;

    public function mount($status_id)
    {
        $this->status_id = $status_id;
    }

    public function render()
    {
        return view('livewire.tabler.status',[
            'status' => $this->status_id,
        ]);
    }
}
