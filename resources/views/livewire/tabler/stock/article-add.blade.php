<div>
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addArticle">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        Article
    </button>

    <div class="modal modal-blur fade" id="addArticle" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <label class="form-label required">Désignation</label>
                                <input type="text" class="form-control" wire:model.defer="designation"/>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label required">Réference</label>
                                <input type="text" class="form-control" wire:model.defer="reference"/>
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label class="form-label">Quantité</label>
                                <input type="text" class="form-control" wire:model.defer="quantity"/>
                            </div> --}}
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
                                        <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div>
                                <label class="form-label">Description</label>
                                <textarea class="form-control" wire:model.defer="description"></textarea>
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" articleAdd>Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
