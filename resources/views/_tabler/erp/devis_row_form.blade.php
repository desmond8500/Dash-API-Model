<div class="row">
    <div class="col-md-8">
        <div class="mb-1">
            <label class="form-label required">Désignation</label>
            <input type="text" class="form-control" wire:model.defer="name"/>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-1">
            <label class="form-label required">Réference</label>
            <textarea class="form-control" wire:model.defer="reference" rows="3"></textarea>
            @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-1">
            <label class="form-label">Prix</label>
            <input type="number" class="form-control" wire:model.defer="price"/>
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-1">
            <label class="form-label">Coéficient</label>
            <input type="number" class="form-control" wire:model.defer="coef"/>
            @error('coef') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-1">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" wire:model.defer="quantity"/>
            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
