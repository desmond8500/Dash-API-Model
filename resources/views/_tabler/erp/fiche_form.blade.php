<div class="col-md-8 mb-3">
    <label class="form-label">Nom </label>
    <div class="input-group">
        <input type="text" class="form-control" wire:model.defer="name" placeholder="Name">
        <div class="dropdown">
            <button class="btn btn-primary btn-icon" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M6 9l6 6l6 -6"></path> </svg>
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                {{-- <h6 class="dropdown-header">Section header</h6> --}}
                <a class="dropdown-item" wire:click="$set('name','Détection Incendie')">Détection Incendie</a>
                <a class="dropdown-item" wire:click="$set('name','Alarme anti intrusion')">Alarme anti intrusion</a>
                {{-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">After divider action</a> --}}
            </div>
        </div>
    </div>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-4 mb-3">
    <label class="form-label">Date</label>
    <input type="date" class="form-control" wire:model.defer="date" placeholder="Name">
    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-6 mb-3">
    <label class="form-label">Type de Fiche</label>
    <select class="form-select" wire:model.defer="type">
        <option value="">Sélectionner</option>
        @foreach ($fiche_type as $item)
            <option value="{{ $item['id'] }}" wire:click='fill_password'>{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-6 mb-3">
    <label class="form-label">Modèle de centrale</label>
    <div class="input-group">
        <input type="text" class="form-control" wire:model.defer="modele" placeholder="Modèle de la centrale">
        <div class="dropdown">
            <button class="btn btn-primary btn-icon" type="button" id="triggerId" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M6 9l6 6l6 -6"></path> </svg>
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <h6 class="dropdown-header">Alarme</h6>
                <a class="dropdown-item" wire:click="$set('modele','GD-48')">GD-48</a>
                <a class="dropdown-item" wire:click="$set('modele','GD-96')">GD-96</a>
                <a class="dropdown-item" wire:click="$set('modele','GD-256')">GD-256</a>
                <a class="dropdown-item" wire:click="$set('modele','GD-512')">GD-512</a>
                <h6 class="dropdown-header">Détection Incendie</h6>
                <a class="dropdown-item" wire:click="$set('modele','CLVR-Z8')">CLVR-Z8</a>
                <a class="dropdown-item" wire:click="$set('modele','CLVR-Z12')">CLVR-Z12</a>

            </div>
        </div>
    </div>
    @error('modele') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-4 mb-3">
    <label class="form-label">Code Maitre</label>
    <input type="text" class="form-control" wire:model.defer="master_code" placeholder="Code maitre">
    @error('master_code') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-4 mb-3">
    <label class="form-label">Code Utilisateur</label>
    <input type="text" class="form-control" wire:model.defer="user_code" placeholder="Code utilisateur">
    @error('user_code') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-4 mb-3">
    <label class="form-label">Code Installateur</label>
    <input type="text" class="form-control" wire:model.defer="tech_code" placeholder="Code Technicien">
    @error('tech_code') <span class="text-danger">{{ $message }}</span> @enderror
</div>
