<?php

namespace App\Http\Livewire\Tabler\Config;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{
    public function render()
    {
        return view('livewire.tabler.config.permissions',[
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ]);
    }
}
