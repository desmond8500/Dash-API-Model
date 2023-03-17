<div class="col-md-8 mb-3">
    <label class="form-label required">Objet</label>
    <input type="text" class="form-control" wire:model.defer="objet" placeholder="Objet">
    @error('objet') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-5 mb-3">
    <label class="form-label required">Date</label>
    <input type="date" class="form-control" wire:model.defer="date">
    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-5 mb-3">
    <label class="form-label">Type</label>
    <select wire:model.defer="type" class="form-select">
        <option value="1">Visite</option>
        <option value="2">Intervention</option>
        <option value="3">Vérification</option>
        <option value="4">Dépannage</option>
    </select>
    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-12 mb-3">
    <label class="form-label">Description</label>
    <textarea wire:model.defer="description" cols="30" rows="3" class="form-control"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
