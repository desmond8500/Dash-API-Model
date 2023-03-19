<?php

namespace App\Http\Livewire\Tabler\Func;

use Carbon\Carbon;
use DateTimeZone;
use Livewire\Component;

class Planning extends Component
{
    public $date, $semaine;

    public function mount()
    {
        $this->date = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);

        $this->semaine =  array(
            'debut'=> $this->date->startOfWeek()->dayName.' '. $this->date->startOfWeek()->day.' '. $this->date->startOfWeek()->monthName.' '. $this->date->startOfWeek()->year,
            'fin'=> $this->date->endOfWeek()-> dayName . ' ' . $this->date->endOfWeek()->day . ' ' . $this->date->endOfWeek()->monthName . ' ' . $this->date->endOfWeek()->year,
        );
    }

    public function render()
    {
        $plannings = array(
            (object) array('dayName' => 'lundi', 'day'=> $this->date->startOfWeek()->day),
            (object) array('dayName' => 'mardi', 'day'=> $this->date->startOfWeek()->day + 1),
            (object) array('dayName' => 'mercredi', 'day'=> $this->date->startOfWeek()->day + 2),
            (object) array('dayName' => 'jeudi', 'day'=> $this->date->startOfWeek()->day + 3),
            (object) array('dayName' => 'vendredi', 'day'=> $this->date->startOfWeek()->day + 4),
            (object) array('dayName' => 'samedi', 'day'=> $this->date->startOfWeek()->day + 5),
            (object) array('dayName' => 'dimanche', 'day'=> $this->date->startOfWeek()->day + 6),
        );

        return view('livewire.tabler.func.planning',[
            'plannings' => $plannings,
            'date' => $this->date,
            'semaine' => $this->semaine,
        ]);
    }


}
