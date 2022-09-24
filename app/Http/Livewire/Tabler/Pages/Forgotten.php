<?php

namespace App\Http\Livewire\Tabler\Pages;

use Livewire\Component;

class Forgotten extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.tabler.pages.forgotten',[

        ])->extends('app.log')->section('content');
    }

    public function resetPassword()
    {
        # code...
    }
}
