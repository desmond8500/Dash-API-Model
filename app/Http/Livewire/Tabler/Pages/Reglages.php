<?php

namespace App\Http\Livewire\Tabler\Pages;

use Livewire\Component;

class Reglages extends Component
{
    public $tab =0;
    public $tab_list;

    public function mount()
    {
        $this->tab_list = array(
            array("name" => "Société", "tab" => 0),
            array("name" => "Utilisateurs", "tab" => 1),
            array("name" => "Permissions", "tab" => 2),
    );
    }

    public function render()
    {
        return view('livewire.tabler.pages.reglages',[
            'tab_list' => $this->tab_list,
        ])->extends('app.layout')->section('content');
    }

    public function set_tab($tab)
    {
        $this->tab = $tab;
    }
}
