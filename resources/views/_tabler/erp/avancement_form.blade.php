<div class="col-md-12 mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" wire:model.defer="name"/>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Batiments</label>
    <select class="form-select"wire:model.defer="building_id">
        <option value="0">Sélectionnez un batiment</option>
        @foreach ($buildings as $building)
            <option value="{{ $building->id }}">{{ $building->name }}</option>
        @endforeach
    </select>
    @error('building_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Systèmes</label>
    <select class="form-select"wire:model.defer="system">
        <option value="0">Sélectionnez un batiment</option>
        @foreach ($systems as $system)
            <option value="{{ $system->id }}">{{ $system->name }}</option>
        @endforeach
    </select>
    @error('system') <span class="text-danger">{{ $message }}</span> @enderror
</div>
