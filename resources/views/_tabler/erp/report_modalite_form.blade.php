<div class="mb-3 col-md-4">
    <div class="col">
        <label class="form-label">Durée</label>
        <input type="number" min="0" class="form-control" wire:model.defer="duree"/>
        @error('duree') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="mb-3 col-md-4">
    <div class="col">
        <label class="form-label">Techniciens</label>
        <input type="number" min="0" class="form-control" wire:model.defer="technicien"/>
        @error('technicien') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="mb-3 col-md-4">
    <div class="col">
        <label class="form-label">Ouvriers</label>
        <input type="number" min="0" class="form-control" wire:model.defer="ouvrier"/>
        @error('ouvrier') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="mb-3 col-md-4">
    <label class="form-label">Complexité</label>
    <select class="form-select"wire:model.defer="complexite">
        <option value="0">Faible</option>
        <option value="1">Moyenne</option>
        <option value="2">Haute</option>
    </select>
    @error('complexite') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3 col-md-4">
    <label class="form-label">Risque</label>
    <select class="form-select"wire:model.defer="risque">
        <option value="0">Faible</option>
        <option value="1">Moyen</option>
        <option value="2">Haut</option>
    </select>
    @error('risque') <span class="text-danger">{{ $message }}</span> @enderror
</div>

{{-- <div>
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model.defer="description"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div> --}}
