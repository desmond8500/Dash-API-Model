<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <div class="col-md-12 mb-1">
                        <label class="form-label required">Désignation</label>
                        <input type="text" class="form-control" placeholder="Désignation" wire:model.defer="name">
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label required">Réference</label>
                        <input type="text" class="form-control" placeholder="Réference" wire:model.defer="reference">
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label required">Priorité</label>
                        <select class="form-select" wire:model.defer="priority">
                            @foreach ($stock->priorities as $key => $priority)
                            <option value="{{ $priority }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-1">
                        <label class="form-label">Description</label>
                        <textarea cols="30" rows="3" lass="form-control" class="form-control" placeholder="Description de l'article"
                            wire:model.defer="description"></textarea>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label">Prix</label>
                        <input type="text" class="form-control" placeholder="Prix" wire:model.defer="price">
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label">Quantité</label>
                        <input type="text" class="form-control" placeholder="Quantité" wire:model.defer="quantity">
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label">Marque</label>
                        <select class="form-select" wire:model.defer="marque">
                            @foreach ($brands as $key => $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label">Fournisseur</label>
                        <select class="form-select" wire:model.defer="fournisseur">
                            @foreach ($providers as $key => $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" wire:click="store_article()">Ajouter</button>
            </div>
        </div>
    </div>
</div>



