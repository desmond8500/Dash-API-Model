 <div class="row mb-3 align-items-end">
    <div class="col-auto">
        <a href="#" class="avatar avatar-upload rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
            <span class="avatar-upload-text">Ajouter</span>
        </a>
    </div>
    <div class="col">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" wire:model.defer="name"/>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<div>
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model.defer="description"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
