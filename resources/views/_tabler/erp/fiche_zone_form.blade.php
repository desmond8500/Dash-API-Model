<div class="col-md-2 mb-3">
    <label class="form-label">Zone</label>
    <input type="text" class="form-control" wire:model.defer="zone" placeholder="Numéro de zone">
    @error('zone') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-5 mb-3">
    <label class="form-label">Equipement</label>
    <div class="input-group">
        <input type="text" class="form-control" wire:model.defer="equipement" placeholder="Name">

        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                @foreach ($equipements as $equipement)
                    <li> <h6 class="dropdown-header bg-dark">{{ $equipement['name'] }}</h6> </li>
                    @foreach ($equipement['list'] as $list_item)
                        <li >
                            <a wire:click="edit_equipement('{{ $list_item }}')" class="dropdown-item">{{ $list_item }}</a>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>

    @error('equipement') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-5 mb-3">
    <label class="form-label">Local</label>
    <div class="input-group">
        <input type="text" class="form-control" wire:model.defer="local" placeholder="Nom du local">

        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-icon dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false"> </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                @foreach ($locaux as $localp)
                    <li>
                        <h6 class="dropdown-header bg-dark">{{ $localp['name'] }}</h6>
                    </li>
                    @foreach ($localp['list'] as $local_item)
                        <li>
                            <a wire:click="edit_local('{{ $local_item }}')" class="dropdown-item">{{ $local_item }}</a>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>

    @error('local') <span class="text-danger">{{ $message }}</span> @enderror
</div>


