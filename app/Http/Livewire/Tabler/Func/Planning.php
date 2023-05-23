<?php

namespace App\Http\Livewire\Tabler\Func;

use App\Models\Task;
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
            (object) array('dayName' => 'lundi', 'day'=> $this->date->startOfWeek()->day,
                'tasks'=> Task::whereDate('debut', '>=', $this->date->startOfWeek())->orWhereDate('fin', '<=', $this->date->startOfWeek())->get() ),
            (object) array('dayName' => 'mardi', 'day'=> $this->date->startOfWeek()->addDays(1)->day,
                'tasks'=> Task::whereDate('debut', '>=', $this->date->startOfWeek()->addDays(1))->orWhereDate('fin', '<=', $this->date->endOfWeek())->get() ),
            (object) array('dayName' => 'mercredi', 'day'=> $this->date->startOfWeek()->addDays(2)->day,
                'tasks'=> Task::whereDate('debut', '>=', $this->date->startOfWeek()->addDays(2))->orWhereDate('fin', '<=', $this->date->endOfWeek()->subDays(2))->get() ),
            (object) array('dayName' => 'jeudi', 'day'=> $this->date->startOfWeek()->addDays(3)->day,
                'tasks'=> Task::whereDate('debut', '>=', $this->date->startOfWeek()->addDays(3))->orWhereDate('fin', '<=', $this->date->endOfWeek()->subDays(3))->get() ),
            (object) array('dayName' => 'vendredi', 'day'=> $this->date->startOfWeek()->addDays(4)->day,
                'tasks'=> Task::whereDate('debut', '>=', $this->date->startOfWeek()->addDays(4))->orWhereDate('fin', '<=', $this->date->endOfWeek()->subDays(4))->get() ),
            (object) array('dayName' => 'samedi', 'day'=> $this->date->startOfWeek()->addDays(5)->day,
                'tasks'=> Task::whereDate('debut', '>=', $this->date->startOfWeek()->addDays(5))->orWhereDate('fin', '<=', $this->date->endOfWeek()->subDays(5))->get() ),
            (object) array('dayName' => 'dimanche', 'day'=> $this->date->startOfWeek()->addDays(6)->day,
                'tasks'=> Task::whereDate('debut', '>=', $this->date->startOfWeek()->addDays(6))->orWhereDate('fin', '<=', $this->date->endOfWeek()->subDays(6))->get() ),
        );

        return view('livewire.tabler.func.planning',[
            'plannings' => $plannings,
            'date' => $this->date,
            'semaine' => $this->semaine,
        ]);
    }

    public function show_task($task_id)
    {
        $this->redirectRoute('tabler.task', ['task_id'=>$task_id]);
    }


}
