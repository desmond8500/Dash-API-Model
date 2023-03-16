<div class="col-md-12 mb-3">
    <label class="form-label required">Nom du Projet</label>
    <input type="text" wire:model.defer="name" class="form-control">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-12 mb-3">
    <label class="form-label">Description du projet</label>
    <textarea class="form-control" wire:model.defer="description" cols="30" rows="3"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>

