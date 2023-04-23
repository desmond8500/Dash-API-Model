<?php

namespace App\Http\Livewire\Tabler\Config;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public $selected_user;

    public function render()
    {
        return view('livewire.tabler.config.users',[
            'users' => User::all(),
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'logged_user' => Auth::user(),
        ]);
    }

    public function select_user($user_id)
    {
        $this->selected_user = User::find($user_id);
    }

    public function assign_role($role)
    {

        auth()->user()->assignRole($role);
    }
    public function revoke_role($role)
    {
        auth()->user()->revokeRole($role);
    }
    public function assign_permission($permission)
    {
        # code...
    }
    public function revoke_permission($permission)
    {
        # code...
    }
}
