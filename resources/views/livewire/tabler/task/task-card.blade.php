<div>
    <div class="row border-bottom py-2">
        <div class="col-auto">
            <button class="btn btn-icon" >
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-dotted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7.5 4.21l0 .01"></path> <path d="M4.21 7.5l0 .01"></path> <path d="M3 12l0 .01"></path> <path d="M4.21 16.5l0 .01"></path> <path d="M7.5 19.79l0 .01"></path> <path d="M12 21l0 .01"></path> <path d="M16.5 19.79l0 .01"></path> <path d="M19.79 16.5l0 .01"></path> <path d="M21 12l0 .01"></path> <path d="M19.79 7.5l0 .01"></path> <path d="M16.5 4.21l0 .01"></path> <path d="M12 3l0 .01"></path> </svg>
            </button>
        </div>
        <div class="col" type="button" wire:click="gotoTask('{{ $tache->id }}')">
            <div class="fw-bold">{{ $tache->objet }}</div>
            <div class="text-muted">{!! nl2br($tache->description) !!}</div>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary btn-icon" data-bs-toggle="modal" data-bs-target="#showTask{{ $tache->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path> <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path> </svg>
            </button>
            <button class="btn btn-outline-primary btn-icon" data-bs-toggle="modal" data-bs-target="#editTask{{ $tache->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
            </button>
            <div class="col-md-12">
                <div class="text-end">
                    @if ($tache->priority_id == 1)
                        <span class="text-primary">Basse</span>
                    @elseif($tache->priority_id == 2)
                        <span class="text-warning">Moyenne</span>
                    @elseif($tache->priority_id == 3)
                        <span class="text-danger">Haute</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="showTask{{ $tache->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <h3>{{ $tache->objet }}</h3>
                        <div>
                            @livewire('tabler.status', ['status_id' => $tache->status_id], key($tache->id))
                        </div>
                    </div>

                    <div class="text-muted">{!! nl2br($tache->description) !!}</div>
                    <hr class="mt-2">
                    @foreach ($tache->photos as $photo)
                        <a data-fslightbox href="{{ asset($photo->folder) }}">
                            <img src="{{ asset($photo->folder) }}" alt="A" class="avatar avatar-xl">
                        </a>
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="taskUpdate()">Modifier</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="editTask{{ $tache->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editer tache</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label required">Titre de la tache</label>
                            <input type="text" class="form-control" wire:model.defer="objet"/>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Statut</label>
                            <select class="form-select"wire:model.defer="status_id">
                                @foreach ($statut as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Priorité</label>
                            <select class="form-select"wire:model.defer="priority_id">
                                @foreach ($priorite as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label required">Description</label>
                            <textarea class="form-control" wire:model.defer="description"></textarea>
                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="taskUpdate()">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>
