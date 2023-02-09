<div >
    <div class="card p-2">
        <div class="row">
            <a class="col-auto" href="{{ route('tabler.projet', ['projet_id' => $projet->id]) }}" >
                <img src="" alt="A" class="avatar">
            </a>
            <a class="col" type="button" href="{{ route('tabler.projet', ['projet_id' => $projet->id]) }}" >
                <div class="fw-bold">{{ $projet->name }}</div>
                <div class="text-muted">{!! nl2br($projet->description) !!} </div>
            </a>
            <div class="col-auto">
                <button class="btn btn-outline-secondary btn-icon" data-bs-toggle="modal" data-bs-target="#editProjet{{ $projet->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="editProjet{{ $projet->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le prjet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label required">Nom du client</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label required">Description du client</label>
                            <textarea class="form-control" wire:model.defer="description" cols="30" rows="3"></textarea>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" wire:click="updateProjet">Modifier</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
