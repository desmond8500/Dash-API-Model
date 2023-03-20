  <div class="col">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" wire:model.defer="name" />
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model.defer="description" ></textarea>
    </div>
</div>
