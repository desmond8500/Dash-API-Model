<div class="col-md-12 mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" wire:model.defer="name"/>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-4 mb-3">
    <label class="form-label">Début</label>
    <input type="date" class="form-control" wire:model.defer="start"/>
    @error('start') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-4 mb-3">
    <label class="form-label">Fin</label>
    <input type="date" class="form-control" wire:model.defer="end"/>
    @error('end') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-4 mb-3">
    <label class="form-label">Progression %</label>
    <input type="number" min="0" max="100" class="form-control" wire:model.defer="progress"/>
    @error('progress') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-12 mb-3">
    <label class="form-label">Commentaire</label>
    <textarea class="form-control" wire:model.defer="comment"></textarea>
    @error('progress') <span class="text-danger">{{ $message }}</span> @enderror
</div>
