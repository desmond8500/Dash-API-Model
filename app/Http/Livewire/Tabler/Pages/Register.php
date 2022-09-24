<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password;
    public $toggle = "password";

    public function render()
    {
        return view('livewire.tabler.pages.register', [

        ] )->extends('app.log')->section('content');
    }

    public function register()
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        if ($user) {
           return redirect()->route('tabler.login');
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
