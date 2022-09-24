<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password;

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
            'password' => $this->password,
        ]);

        var_dump($user);

        // if ($user) {
        //     return redirect()->route('index');
        // } else {
        // }

    }
}
