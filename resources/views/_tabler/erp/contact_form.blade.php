<div class="col-md-6 mb-3 required">
    <label class="form-label">Prénom</label>
    <input type="text" class="form-control" wire:model.defer="firstname"/>
    @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-6 mb-3 required">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" wire:model.defer="lastname"/>
    @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-6 mb-3 required">
    <label class="form-label">Téléphone</label>
    <input type="text" class="form-control" wire:model.defer="tel"/>
    @error('tel') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Email</label>
    <input type="text" class="form-control" wire:model.defer="email"/>
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-12 mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model.defer="description"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>

