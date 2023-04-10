<?php

namespace App\Http\Livewire\Tabler\Pages;

use Livewire\Component;

class Reglages extends Component
{
    public $tab =0;
    protected $tab_list;

    public function mount()
    {
        $this->tab_list = (object) array(
            (object) array("name" => "Société", "tab" => 0)
    );
    }

    public function render()
    {
        return view('livewire.tabler.pages.reglages',[
            'tab_list' => $this->tab_list,
        ])->extends('app.layout')->section('content');
    }
}
