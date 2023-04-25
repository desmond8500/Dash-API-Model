<div>
    <div class="row">
        <div class="col-md-8">
            @if ($selected_user)
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Editer un compte
                        </div>
                        <div class="card-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card p-2">
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="{{ $selected_user->avatar }}" alt="A" class="avatar avatar-md">
                                        </div>
                                        <div class="col">
                                            <div class="card-title">{{ $selected_user->name }}</div>
                                            <div class="text-muted">{{ $selected_user->email }}</div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="fw-bold my-1">Roles</div>
                                @foreach ($roles as $role)
                                    @if ($logged_user->hasRole($role->name))
                                        <button class="btn btn-danger mb-1" wire:click="revoke_role('{{ $role->name }}')">{{ $role->name }}</button>
                                    @else
                                        <button class="btn btn-primary mb-1" wire:click="assign_role('{{ $role->name }}')">{{ $role->name }}</button>
                                    @endif
                                @endforeach
                                <hr>
                                <div class="fw-bold my-1">Permissions</div>
                                @foreach ($permissions as $permission)
                                    <button class="btn btn-primary  mb-1">{{ $permission->name }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            @foreach ($users as $user)
                <div class="card p-2">
                    <div class="row" wire:click="select_user('{{ $user->id }}')" type="button" >
                        <div class="col-auto">
                            <img src="{{ $user->avatar }}" alt="A" class="avatar avatar-md">
                        </div>
                        <div class="col" wire:click="select_user('{{ $user->id }}')" type="button">
                            <div class="card-title">{{ $user->name }}</div>
                            <div class="text-muted">
                                <div>{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="col-auto">
                          <button class="btn btn-outline-primary btn-icon" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                          </button>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
