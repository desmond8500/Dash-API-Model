<div>
    @component('components.tabler.header', ['title'=>'Tache', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        <a class="btn btn-primary" href="{{ url()->previous() }}">Retour</a>
        @if (!$form_photo)
            <button class="btn btn-primary" wire:click="$set('form_photo',1)">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                Photos
            </button>
        @endif
    @endcomponent


    <div class="row">
        <div class="col-md-4">
            <div class="card p-2">
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">{{ $task->objet }}</div>
                    <button class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#editTask">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                    </button>
                </div>
                <div class="text-muted">{!! nl2br($task->description) !!}</div>
            </div>

        </div>

        <div class="col-md-8">

            @foreach ($task->photos as $photo)
                <a data-fslightbox href="{{ asset($photo->folder) }}">
                    <img src="{{ asset($photo->folder) }}" alt="A" class="avatar avatar-xl">
                </a>
            @endforeach


            @if ($form_photo)
                <div class="card card-body mt-2">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Photos</label>
                        <div class="input-group">
                            <input type="file" class="form-control" wire:model.defer="photos" multiple>
                            <button class="btn btn-primary" wire:click="add_photos()">Ajouter</button>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-secondary" wire:click="$set('form_photo',0)">Fermer</button>
                    </div>


                </div>
            @endif

        </div>
    </div>

    <div class="modal modal-blur fade" id="editTask" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Add a new team</h5>
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
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="updateTask()">Modifier</button>
                    </div>
            </div>
        </div>
    </div>
</div>


