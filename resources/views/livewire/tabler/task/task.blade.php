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
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $task->objet }}</div>
                    <div class="card-actions">
                        <button class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#editTask">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                        </button>
                    </div>
                </div>
                <div class="card-body">{!! nl2br($task->description) !!}</div>
            </div>

        </div>

        <div class="col-md-8">
            <div wire:loading>
                <div class="d-flex justify-content-between">
                    <div>Chargement <span class="animated-dots"></div>
                </div>
            </div>

            <div id="lightgallery">
                @foreach ($task->photos as $photo)
                    <a href="{{ asset($photo->folder) }}">
                        <img src="{{ asset($photo->folder) }}" alt="A" class="avatar avatar-xl">
                    </a>
                @endforeach
            </div>

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

    @include('_tabler.modal',[
        'id' => "editTask",
        'title' => "Editer la tache",
        'include' => "_tabler.erp.task_form",
        'method' => "updateTask",
        'submit' => "Modifier"
    ])
    <script> window.addEventListener('close-modal', event => { $("#editTask").modal('hide'); }) </script>

</div>


