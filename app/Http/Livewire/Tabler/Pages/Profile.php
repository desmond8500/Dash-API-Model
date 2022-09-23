<?php

namespace App\Http\Livewire\Tabler\Pages;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.tabler.pages.profile',[

        ])->extends('app.layout-h')->section('content');
    }


}
