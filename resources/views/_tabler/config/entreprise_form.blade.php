<div class="col-auto">
    <div wire:loading>
        Chargement <div class="spinner-border" role="status"></div>
    </div>
        <label href="#" class="avatar avatar-upload rounded" for="file">
            @if ($logo)
                @if (is_string($logo))
                    <img src="{{ asset($logo) }}" class="avatar">
                @else
                    <img src="{{ $logo->temporaryUrl() }}" class="avatar">
                @endif
            @else
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
        @endif
        <span class="avatar-upload-text">Ajouter</span>
        <input type="file" style="display: none" id="file" accept="image/*" wire:model.defer="logo">
    </label>
</div>
<div class="col-md mb-3">
    <label class="form-label">Nom de l'entreprise</label>
    <input type="text" class="form-control" wire:model.defer="name" placeholder="Nom de l'entreprise">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="w-100"></div>

<div class="col-md-6 mb-3">
    <label class="form-label">Adresse</label>
    <input type="text" class="form-control" wire:model.defer="adress" placeholder="Adresse">
    @error('adress') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-6 mb-3">
    <label class="form-label">Mail</label>
    <input type="email" class="form-control" wire:model.defer="mail" placeholder="Mail">
    @error('mail') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Site Web</label>
    <input type="text" class="form-control" wire:model.defer="site" placeholder="Site Web">
    @error('site') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-6 mb-3">
    <label class="form-label">NINEA</label>
    <input type="text" class="form-control" wire:model.defer="ninea" placeholder="NINEA">
    @error('ninea') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-6 mb-3">
    <label class="form-label">Banque</label>
    <input type="text" class="form-control" wire:model.defer="banque" placeholder="Banque">
    @error('banque') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-6 mb-3">
    <label class="form-label">Registre de commerce</label>
    <input type="text" class="form-control" wire:model.defer="rccm" placeholder="Registre de commerce">
    @error('rccm') <span class="text-danger">{{ $message }}</span> @enderror
</div>

