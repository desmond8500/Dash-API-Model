<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDevis" >
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        Devis
    </button>

    <div class="modal modal-blur fade" id="addDevis" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un Devis</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="invoiceAdd()" >Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
