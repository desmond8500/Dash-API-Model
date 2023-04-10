<div>
    @if ($entreprise)

    @else
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#initEnt">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Générer
        </button>
    @endif

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Informations sur la société</div>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-icon" wire:click="edit_entreprise">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if ($edit)
                            @include('_tabler.config.entreprise_form')
                            <div class="col-md-12">
                                <a class="btn btn-secondary" wire:click="$toggle('edit')">Fermer</a>
                                <button class="btn btn-primary" wire:click="update_entreprise">Modifier</button>
                            </div>
                        @else
                            <div class="col-md-3">
                                <img src="{{ asset($entreprise->logo) }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex border-bottom py-2 justify-content-between">
                                    <div class="fw-bold">Nom de la société</div>
                                    <div>{{ $entreprise->name }}</div>
                                </div>
                                <div class="d-flex border-bottom py-2 justify-content-between">
                                    <div class="fw-bold">Adresse mail</div>
                                    <div>{{ $entreprise->mail }}</div>
                                </div>
                                <div class="d-flex border-bottom py-2 justify-content-between">
                                    <div class="fw-bold">Adresse de la société</div>
                                    <div>{{ $entreprise->adress }}</div>
                                </div>
                                <div class="d-flex border-bottom py-2 justify-content-between">
                                    <div class="fw-bold">Site web</div>
                                    <div>{{ $entreprise->site }}</div>
                                </div>
                                <div class="d-flex border-bottom py-2 justify-content-between">
                                    <div class="fw-bold">NINEA</div>
                                    <div>{{ $entreprise->ninea }}</div>
                                </div>

                                <div class="d-flex border-bottom py-2 justify-content-between">
                                    <div class="fw-bold">Registre de commerce</div>
                                    <div>{{ $entreprise->rccm }}</div>
                                </div>
                                <div class="d-flex border-bottom py-2 justify-content-between">
                                    <div class="fw-bold">Banque</div>
                                    <div>{{ $entreprise->banque }}</div>
                                </div>

                            </div>


                        @endif

                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>

        </div>
        <div class="col-md-9">

        </div>
    <div>

    {{-- Modals  --}}



    @include('_tabler.modal',[
        'id' => "initEnt",
        'title' => "Générer une entreprise",
        'include' => "_tabler.config.entreprise_form",
        'method' => "add_entreprise"
    ])
    <script> window.addEventListener('close-modal', event => { $("#initEnt").modal('hide'); }) </script>

</div>
