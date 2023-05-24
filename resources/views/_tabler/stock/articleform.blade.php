<div class="row">
    <div class="col-12 mb-3">
        <div wire:loading>
            Chargement <div class="spinner-border" role="status"></div>
        </div>
        @if ($photos)
            @foreach ($photos as $photo)
                <img src="{{ $photo->temporaryUrl() }}" class="avatar avatar-md">
            @endforeach
        @endif
    </div>
    <div class="w-100"></div>
    <div class="col-auto mb-3">
        <label href="#" class="avatar avatar-upload rounded" for="file">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
            <span class="avatar-upload-text">Ajouter</span>
            <input type="file" style="display: none" id="file" accept="image/*" multiple wire:model.defer="photos">
        </label>
    </div>
    <div class="col-md mb-3">
        <label class="form-label required">Désignation</label>
        <input type="text" class="form-control" wire:model.defer="designation"/>
        @error('designation') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label required">Réference</label>
        <div class="input-group">
            <input type="text" class="form-control" wire:model.defer="reference"/>
            <a class="btn btn-primary btn-icon" wire:click='uppercase_reference'>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 20v-8h-3.586a1 1 0 0 1 -.707 -1.707l6.586 -6.586a1 1 0 0 1 1.414 0l6.586 6.586a1 1 0 0 1 -.707 1.707h-3.586v8a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path> </svg>
            </a>
        </div>
        @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Prix</label>
        <div class="input-group">
            <input type="text" class="form-control" wire:model.defer="price"/>
            <a class="btn btn-primary btn-icon" wire:click="convert('euro')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-euro" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M17.2 7a6 7 0 1 0 0 10"></path> <path d="M13 10h-8m0 4h8"></path> </svg>
            </a>
            <a class="btn btn-primary btn-icon" wire:click="convert('dollar')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-dollar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path> <path d="M12 3v3m0 12v3"></path> </svg>
            </a>
        </div>
        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Priorité</label>
        <select class="form-select"wire:model.defer="priority_id">
            <option value="0">Sélectionner</option>
            @foreach ($priorite as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
        @error('priority_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Marque</label>
        <select class="form-select"wire:model.defer="brand_id">
            <option value="0" disabled>Sélectionner</option>
            @foreach ($marques as $marque)
                <option value="{{ $marque->id }}">{{ $marque->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Fournisseur</label>
        <select class="form-select"wire:model.defer="provider_id">
            <option value="0" >Sélectionner</option>
            @foreach ($providers as $provider)
                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-12">
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model.defer="description"></textarea>
    </div>
</div>
