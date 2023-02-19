<div class="row">
    <div class="mb-3 col-md-8">
        <label class="form-label">Nom du client</label>
        <input type="text" class="form-control" wire:model.defer="client_name"/ placeholder="Prénom et Nom">
    </div>
    <div class="mb-3 col-md-4">
        <label class="form-label">Téléphone du client</label>
        <input type="text" class="form-control" wire:model.defer="client_tel"/ placeholder="Numéro de Téléphone">
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Adresse du client</label>
        <input type="text" class="form-control" wire:model.defer="client_address" placeholder="Lieu"/>
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label">Remise</label>
        <input type="text" class="form-control" wire:model.defer="discount" placeholder="0 à 100"/>
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label">Taxe</label>
        <select class="form-select" wire:model.defer="tax">
            <option value="0">Pas de taxe</option>
            <option value="1">BRS (5%)</option>
            <option value="2">TVA (18%)</option>
        </select>
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label">Statut</label>
        <select class="form-select" wire:model.defer="status">
            <option value="1">Nouveau</option>
            <option value="2">En Cours</option>
            <option value="3">En Pause</option>
            <option value="4">Terminé</option>
            <option value="5">Annulé</option>
        </select>
    </div>

    <div>
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model.defer="description" placeholder="Description du client"></textarea>
    </div>

</div>
