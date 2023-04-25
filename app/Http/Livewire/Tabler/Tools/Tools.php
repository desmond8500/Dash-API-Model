<?php

namespace App\Http\Livewire\Tabler\Tools;

use Livewire\Component;

class Tools extends Component
{
    public $breadcrumbs;

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Tools', 'route' => route('tabler.tools')),
        );
    }
    public function render()
    {
        return view('livewire.tabler.tools.tools')->extends('app.layout')->section('content');
    }
}
