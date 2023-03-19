<div class="col-md-12">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" wire:model.defer="name"/>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-12">
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model.defer="description"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
