<?php

namespace App\Http\Livewire\Tabler\Pages;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.tabler.pages.login',[

        ])->extends('app.log')->section('content');
    }

    public function login()
    {

    }
}
