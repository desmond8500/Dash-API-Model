<div class="row">
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBatiment">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Batiment
        </button>
    </div>

        <div class="modal modal-blur fade" id="addBatiment" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un Batiment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control" wire:model.defer="name" />
                                </div>

                                <div>
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" wire:model.defer="description" ></textarea>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="buildingAdd()">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
