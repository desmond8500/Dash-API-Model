<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Centre d'intérets</div>
            <div class="card-actions">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInteret">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                  Intéret
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($interets as $interet)
                    <li class="d-flex justify-content-between border-bottom">
                        <div>{{ $interet->nom }}</div>
                        {{-- <div>{{ $interet->niveau }}</div> --}}
                        <div>
                            <button class="btn btn-icon btn-ghost-primary" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                            </button>
                            <button class="btn btn-icon btn-ghost-danger" wire:click="delete('{{ $interet->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>


    <div class="modal modal-blur fade" id="addInteret" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="add">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un centre d'intéret</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" wire:model.defer="nom"/>
                                @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-auto">
                                <label class="form-label">Niveau</label>
                                <select class="form-select"wire:model.defer="niveau">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" >Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('close-modal', event => {
        $("#addInteret").modal('hide');
        })
    </script>
</div>
