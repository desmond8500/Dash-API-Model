<div class="row">
    <div class="col-md-12 mb-3">
        <div wire:loading>
            Chargement <div class="spinner-border" role="status"></div>
        </div>
        @if ($photos)
            @foreach ($photos as $photo)
                <img src="{{ $photo->temporaryUrl() }}" class="avatar">

            @endforeach
        @endif
    </div>
    <div class="col-auto">
        <label href="#" class="avatar avatar-upload rounded" for="file">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
            <span class="avatar-upload-text">Ajouter</span>
            <input type="file" style="display: none" id="file" accept="image/*" multiple wire:model.defer="photos">
        </label>
    </div>
    <div class="col-md">
        <label class="form-label required">Désignation</label>
        <input type="text" class="form-control" wire:model.defer="designation"/>
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label required">Réference</label>
        <input type="text" class="form-control" wire:model.defer="reference"/>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Prix</label>
        <input type="text" class="form-control" wire:model.defer="price"/>
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label">Priorité</label>
        <select class="form-select"wire:model.defer="priority">
            @foreach ($priorite as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 col-md-5">
        <label class="form-label">Marque</label>
        <select class="form-select"wire:model.defer="brand_id">
            @foreach ($marques as $marque)
                <option value="0">Sélectionner</option>
                <option value="{{ $marque->id }}">{{ $marque->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-12">
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model.defer="description"></textarea>
    </div>
</div>
