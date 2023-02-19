<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label required">Désignation</label>
        <input type="text" class="form-control" wire:model.defer="name"/>
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label required">Réference</label>
        <input type="text" class="form-control" wire:model.defer="reference"/>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Prix</label>
        <input type="number" class="form-control" wire:model.defer="price"/>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Coéficient</label>
        <input type="number" class="form-control" wire:model.defer="coef"/>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" class="form-control" wire:model.defer="quantity"/>
    </div>


</div>
