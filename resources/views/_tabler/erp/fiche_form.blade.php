<div class="col-md-12 mb-3">
    <label class="form-label">Nom </label>
    <input type="text" class="form-control" wire:model.defer="name" placeholder="Name">
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
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
</div>
