<div class="col-md-8 mb-3">
    <label class="form-label">Titre de la section</label>
    <input type="text" class="form-control" wire:model.defer="section_title"/>
    @error('section_title') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-4 mb-3">
    <label class="form-label">Ordre</label>
    <input type="number" class="form-control" wire:model.defer="section_order"/>
    @error('section_order') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div>
    <label class="form-label">Description de la section</label>
    <textarea class="form-control" wire:model.defer="section_description"></textarea>
    @error('section_description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
