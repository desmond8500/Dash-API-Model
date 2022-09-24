<?php

namespace App\Http\Livewire\Tabler;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.tabler.index',[
            'users' => User::all()
        ])->extends('app.layout')->section('content');
    }
}
