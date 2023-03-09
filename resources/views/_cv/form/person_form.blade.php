<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" class="form-control" wire:model.defer="prenom"/>
        @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" wire:model.defer="nom"/>
        @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Fonction</label>
        <input type="text" class="form-control" wire:model.defer="fonction"/>
        @error('fonction') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Téléphone</label>
        <input type="phone" class="form-control" wire:model.defer="tel"/>
        @error('tel') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Adresse</label>
        <input type="text" class="form-control" wire:model.defer="adresse"/>
        @error('adresse') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" wire:model.defer="email"/>
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-12">
        <label class="form-label">Profile</label>
        <textarea class="form-control" wire:model.defer='profile'></textarea>
        @error('profile') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
