<div class="col-md-12 mb-3">
    <label class="form-label required">Titre de la tache</label>
    <input type="text" class="form-control" wire:model.defer="objet" />
    @error('objet') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="mb-3 col-md-4">
    <label class="form-label">Statut</label>
    <select class="form-select" wire:model.defer="status_id">
        @foreach ($statut as $item)
        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('status_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3 col-md-4">
    <label class="form-label">Priorité</label>
    <select class="form-select" wire:model.defer="priority_id">
        @foreach ($priorite as $item)
        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('priority_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="w-100"></div>
<div class="mb-3 col-md-4">
    <label class="form-label">Date debut</label>
    <input type="date" class="form-control" wire:model.defer="debut" />
    @error('debut') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3 col-md-4">
    <label class="form-label">Date de fin</label>
    <input type="date" class="form-control" wire:model.defer="fin" />
    @error('fin') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-12 mb-3">
    <label class="form-label required">Description</label>
    <textarea class="form-control" wire:model.defer="description"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
