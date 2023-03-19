<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Building;
use App\Models\Planning;
use App\Models\Projet;
use App\Models\System;
use Livewire\Component;

class Plannings extends Component
{
    public $projet_id, $projet;
    public $tab = 1;
    public $batiment_id, $system_id, $tache, $date, $status;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
    }

    protected $rules = [
        'tache' => 'required',
        'date' => 'required',
        'batiment_id' => 'required',
        'system_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.tabler.erp.plannings',[
            'plannings' => Planning::where('projet_id', $this->projet_id)->get(),
            'batiments' => Building::where('projet_id', $this->projet_id)->get(),
            'systems' => System::where('projet_id', $this->projet_id)->get(),
        ]);
    }

    public function add_task()
    {
        $this->validate($this->rules);

        Planning::create([
            'projet_id' => $this->projet_id,
            'batiment_id' => $this->batiment_id,
            'stage_id' => $this->stage_id,
            'tache' => $this->tache,
            'date' => $this->date,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }
}
