<?php

namespace App\Http\Livewire\Tabler\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    public $toggle = "password";
    public $auth;

    public function render()
    {
        return view('livewire.tabler.pages.login',[
            'auth' => $this->auth
        ])->extends('app.log')->section('content');
    }

    public function login()
    {
        $auth = Auth::attempt(['email' => $this->email, 'password' => $this->password, 'active' => 1]);
        $this->auth = $auth;

        if ($auth) {
            return redirect()->route('index');
        } else {
        }


    }

    public function togglePassword()
    {
        if ($this->toggle == "password") {
            $this->toggle = "text";
        } else {
            $this->toggle = "password";
        }

    }
}
