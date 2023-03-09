<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Pays</label>
        <input type="text" class="form-control" wire:model.defer="pays"/>
        @error('pays') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Ville</label>
        <input type="text" class="form-control" wire:model.defer="ville"/>
        @error('ville') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Date de début</label>
        <input type="date" class="form-control" wire:model.defer="debut"/>
        @error('debut') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Date de fin</label>
        <input type="date" class="form-control" wire:model.defer="fin"/>
        @error('fin') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Entreprise</label>
        <input type="text" class="form-control" wire:model.defer="entreprise"/>
        @error('entreprise') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    {{-- <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" wire:model.defer="email"/>
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-12">
        <label class="form-label">Profile</label>
        <textarea class="form-control" wire:model.defer='profile'></textarea>
        @error('profile') <span class="text-danger">{{ $message }}</span> @enderror
    </div> --}}
</div>
