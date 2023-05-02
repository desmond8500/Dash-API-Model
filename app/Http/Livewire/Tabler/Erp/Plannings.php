<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Http\Controllers\DateController;
use App\Models\Building;
use App\Models\Planning;
use App\Models\Projet;
use App\Models\System;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;

class Plannings extends Component
{
    public $projet_id, $projet, $planning_id;
    public $tab = 1;
    public $batiment_id, $system_id, $tache, $debut, $fin, $status = true;
    public $carbon ,$carbon2, $start, $end;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
        $this->carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);
        $this->carbon2 = Carbon::now()->settings([
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
        'status' => 'required',
    ];

    public function render()
    {
        $start1 = $this->carbon->startOfWeek()->subWeek();
        $end1 = $this->carbon2->startOfWeek()->addWeek()->subDay();
        return view('livewire.tabler.erp.plannings',[
            'plannings' => Planning::where('projet_id', $this->projet_id)->get(),
            'buildings' => Building::where('projet_id', $this->projet_id)->get(),
            'batiments' => Building::where('projet_id', $this->projet_id)->get(),
            'systems' => System::where('projet_id', $this->projet_id)->get(),
            'carbon' => $this->carbon,
            'projet_id' => $this->projet_id,
            "period" => CarbonPeriod::create($start1, '1 days', $end1),
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
            'status' => $this->status,
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
        $this->status = $planning->status;
        $this->debut = date_format($planning->debut, ('Y-m-d'));
        $this->fin = date_format($planning->fin, ('Y-m-d'));
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
        $planning->status = $this->status;
        $planning->save();
        $this->reset('planning_id');
    }
}
