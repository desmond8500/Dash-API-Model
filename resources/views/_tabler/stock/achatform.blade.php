<div class="row">
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
