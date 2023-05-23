<div>
    <div>
        @component('components.tabler.header', ['title'=>'Projets', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
            @livewire('tabler.erp.projet-add', ['client_id' => $client_id])
        @endcomponent
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card p-2">
                <div class="row">
                    @if ($edit)
                        @include('_tabler.erp.client_form')
                        <div class="col-md-12 d-flex justify-content-between">
                            <a class="btn btn-secondary" wire:click="$set('edit', false)">Fermer</a>
                            <button class="btn btn-primary" wire:click='update'>Modifier</button>
                        </div>
                    @else
                        <div class="col-auto">
                            <img src="{{ asset($client->logo) }}" alt="A" class="avatar avatar-md">
                        </div>
                        <div class="col">
                            <h3 class="fw-bold">{{ $client->name }}</h3>
                            <div class="text-muted">
                                {!! nl2br($client->description) !!}
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-icon" wire:click="editClient">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                            </button>
                        </div>
                    @endif
                </div>
                {{-- <hr> --}}
                <div class="d-flex justify-content-between mx-2 mt-2 p-2 border rounded btn btn-outline-primary" >
                    <div class="fw-bold">Projets</div>
                    <div>
                        <span class="badge badge-pill bg-blue">{{ $client->projets->count() }}</span>

                    </div>
                </div>
                <div class="d-flex justify-content-between mx-2 mt-2 p-2 border rounded btn btn-outline-primary" >
                    <div class="fw-bold">Nouveaux devis</div>
                    <div>_</div>
                </div>
                <div class="d-flex justify-content-between mx-2 mt-2 p-2 border rounded btn btn-outline-primary" >
                    <div class="fw-bold">Devis en cours</div>
                    <div>_</div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="row">
                <div class="col-md-12 gx-2">
                    <div class="input-group">
                        <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:keydown.enter='getProjets'>
                        <button class="btn btn-primary btn-icon" wire:click="getProjets">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
                        </button>
                        @if ($search)
                            <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                            </button>
                        @endif
                    </div>
                </div>
                @foreach ($projets as $projet)
                    <div class="col-md-4 g-2">
                        @livewire('tabler.erp.projet-card', ['projet' => $projet], key($projet->id))
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
