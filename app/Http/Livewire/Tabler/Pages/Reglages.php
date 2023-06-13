<?php

namespace App\Http\Livewire\Tabler\Pages;

use Livewire\Component;

class Reglages extends Component
{
    public $tab = 0;
    public $tablist = array(
         array( 'id'=> 0 ,'name' => 'Permissions')
    );

    public function render()
    {
        return view('livewire.tabler.pages.reglages',[

        ])->extends('app.layout')->section('content');
    }

    public function select_tab($tab_id)
    {
        $this->tab = $tab_id;
    }
}
