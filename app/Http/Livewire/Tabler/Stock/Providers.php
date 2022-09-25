<?php

namespace App\Http\Livewire\Tabler\Stock;

use Livewire\Component;

class Providers extends Component
{
    public function render()
    {
        return view('livewire.tabler.stock.providers')->extends('app.layout')->section('content');
    }
}
