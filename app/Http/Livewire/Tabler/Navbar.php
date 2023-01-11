<?php

namespace App\Http\Livewire\Tabler;

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.tabler.navbar',[
            'user' => Auth::user() ?? null,
            'menus' => MenuController::menus(),
            'index' => (object) array('name' => 'Dash API', 'route' => 'index'),
            // 'index' => (object) array('name' => 'Dash API', 'route' => 'index'),
        ]);
    }

    public function menu()
    {
        return MenuController::menus();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
