<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label required">Désignation</label>
        <input type="text" class="form-control" wire:model.defer="designation"/>
    </div>

    <div class="col-md-5 mb-3">
        <label class="form-label required">Réference</label>
        <input type="text" class="form-control" wire:model.defer="reference"/>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Prix</label>
        <input type="number" class="form-control" wire:model.defer="price"/>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" class="form-control" wire:model.defer="quantity"/>
    </div>

    <div class="col-md-12">
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model.defer="description"></textarea>
    </div>
</div>
