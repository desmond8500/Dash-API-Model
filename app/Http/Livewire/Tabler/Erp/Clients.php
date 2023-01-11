<?php

namespace App\Http\Livewire\Tabler\Erp;

use Livewire\Component;

class Clients extends Component
{
    public function render()
    {
        return view('livewire.tabler.erp.clients',[

        ])->extends('app.layout')->section('content');;
    }
}
