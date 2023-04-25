<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-header">
                    <div class="card-title">Permissions</div>
                    <div class="card-actions">

                    </div>
                </div>
                <div class="card-body">
                    @foreach ($permissions as $permission)
                        <button class="btn btn-primary  mb-1">{{ $permission->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-header">
                    <div class="card-title">Roles</div>
                    <div class="card-actions">

                    </div>
                </div>
                <div class="card-body">
                    @foreach ($roles as $role)
                        <button class="btn btn-primary  mb-1" >{{ $role->name }}</button>
                    @endforeach
                </div>
            </div>

        </div>
    <div>
</div>
