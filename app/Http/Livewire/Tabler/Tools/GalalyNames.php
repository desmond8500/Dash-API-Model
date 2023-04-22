<?php

namespace App\Http\Livewire\Tabler\Tools;

use App\Http\Controllers\ToolsController;
use Livewire\Component;

class GalalyNames extends Component
{
    public $breadcrumbs;
    public $name;

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Tools', 'route' => route('tabler.tools')),
        );
    }
    public function render()
    {
        return view('livewire.tabler.tools.galaly-names',[
            'result' => $this->convert(),
        ])->extends('app.layout')->section('content');
    }


    // protected $rules = ['name' => 'required'];
    public function convert()
    {
        // $this->validate($this->rules);
        return ToolsController::convert($this->name);
    }
}
