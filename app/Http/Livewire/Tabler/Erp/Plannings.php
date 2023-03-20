<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Http\Controllers\DateController;
use App\Models\Building;
use App\Models\Planning;
use App\Models\Projet;
use App\Models\System;
use Carbon\Carbon;
use Livewire\Component;

class Plannings extends Component
{
    public $projet_id, $projet, $planning_id;
    public $tab = 1;
    public $batiment_id, $system_id, $tache, $debut, $fin, $status;
    public $carbon, $start, $end;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
        $this->carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);
    }

    protected $rules = [
        'tache' => 'required',
        'debut' => ['required', 'date'],
        'fin' => ['required', 'date'],
        'batiment_id' => 'required',
        'system_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.tabler.erp.plannings',[
            'plannings' => Planning::where('projet_id', $this->projet_id)->get(),
            'buildings' => Building::where('projet_id', $this->projet_id)->get(),
            'batiments' => Building::where('projet_id', $this->projet_id)->get(),
            'systems' => System::where('projet_id', $this->projet_id)->get(),
            'carbon' => $this->carbon,
            'projet_id' => $this->projet_id,
        ]);
    }

    public function add_task()
    {
        $this->validate($this->rules);

        Planning::create([
            'projet_id' => $this->projet_id,
            'batiment_id' => $this->batiment_id,
            'system_id' => $this->system_id,
            'tache' => $this->tache,
            'debut' => $this->debut,
            'fin' => $this->fin,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function validDate()
    {
        return 1;
    }

    public function edit_task($planning_id)
    {
        $this->planning_id = $planning_id;

        $planning = Planning::find($planning_id);
        $this->projet_id = $planning->projet_id;
        $this->batiment_id = $planning->batiment_id;
        $this->system_id = $planning->system_id;
        $this->status = $planning->status;
        $this->tache = $planning->tache;
        $this->debut = $planning->debut;
        $this->fin = $planning->fin;
    }

    public function update_task()
    {
        $this->validate($this->rules);

        $planning = Planning::find($this->planning_id);

        $planning->projet_id = $this->projet_id;
        $planning->batiment_id = $this->batiment_id;
        $planning->system_id = $this->system_id;
        $planning->status = $this->status;
        $planning->tache = $this->tache;
        $planning->debut = $this->debut;
        $planning->fin = $this->fin;
        $planning->save();
        $this->reset('planning_id');
    }
}
