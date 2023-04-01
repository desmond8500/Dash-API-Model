<div class="row mb-3 align-items-end">

    <div class="col">
        <label class="form-label">Nom de la catégorie</label>
        <input type="text" class="form-control" wire:model.defer="category_name"/>
        @error('category_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

</div>
