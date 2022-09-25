<?php

namespace App\Http\Livewire\Tabler\Stock;

use Livewire\Component;

class Brands extends Component
{
    public function render()
    {
        return view('livewire.tabler.stock.brands')->extends('app.layout')->section('content');
    }
}
