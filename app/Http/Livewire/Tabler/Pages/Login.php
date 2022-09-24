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
        $auth = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
            'active' => 1
        ]);

        $auth = Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if ($auth) {
            return redirect()->route('index');
        } else {
            session()->flash('message', 'Les identifiants saisis sont incorrectes');
            $this->alert = 'Les identifiants saisis sont incorrectes';
        }
        $this->alert = $auth;
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
