<div class="row">
    <div class="col-auto mb-3">
        <div wire:loading>
            Chargement <div class="spinner-border" role="status"></div>
        </div>
        <label href="#" class="avatar avatar-upload rounded" for="file">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
            <span class="avatar-upload-text">Ajouter</span>
            <input type="file" style="display: none" id="file" multiple wire:model.defer="facture">
        </label>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" wire:model.defer="name" />
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Date</label>
        <input type="date" class="form-control" wire:model.defer="date" />
    </div>

    <div class="mb-3 col-md-6">
        <div class="form-label">TVA {{ $tva }}</div>
        <input type="number" class="form-control" wire:model.defer="tva" />
    </div>

    <div>
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model.defer="description"></textarea>
    </div>
</div>



