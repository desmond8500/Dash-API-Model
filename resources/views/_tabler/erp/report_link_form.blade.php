<div class="row mb-3">
    <div class="col">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" wire:model.defer="link_name"/>
        @error('link_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label class="form-label">Lien</label>
        <input type="text" class="form-control" wire:model.defer="link"/>
        @error('link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
