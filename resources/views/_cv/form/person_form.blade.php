<div class="row">

    <div class="col-auto">
        @if ($photo)
            <img src="{{ $photo->temporaryUrl() }}" class="avatar">
        @endif
        <label href="#" class="avatar avatar-upload rounded" for="file">
        <div wire:loading>
            <div class="spinner-border" role="status"></div>
        </div>
        <div wire:loading.remove>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
        </div>
            <span class="avatar-upload-text">Ajouter</span>
            <input type="file" style="display: none" id="file" accept="image/*" wire:model.defer="photo">
        </label>
    </div>

    <div class="col-md-5 mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" class="form-control" wire:model.defer="prenom"/>
        @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-5 mb-3">
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
        <label class="form-label">Date de naissance</label>
        <input type="text" class="form-control" wire:model.defer="date"/>
        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
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
    <div class="col-md-6 mb-3">
        <label class="form-label">Information 1</label>
        <input type="text" class="form-control" wire:model.defer="info1"/>
        @error('info1') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Information 2</label>
        <input type="text" class="form-control" wire:model.defer="info2"/>
        @error('info2') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Information 3</label>
        <input type="text" class="form-control" wire:model.defer="info3"/>
        @error('info3') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-12">
        <label class="form-label">Profile</label>
        <textarea class="form-control" wire:model.defer='profile'></textarea>
        @error('profile') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
