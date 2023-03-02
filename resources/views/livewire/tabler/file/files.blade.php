<div>
    @component('components.tabler.header', ['title'=>'Fichiers', 'subtitle'=>'Fichiers', 'breadcrumbs'=>$breadcrumbs])
        {{-- <button class="btn btn-primary" >
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
          Fichier
        </button> --}}
    @endcomponent

    <div class="row">
        <div class="col-md-6">
            @if ($file_id)
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Fichier</div>
                        <div class="card-actions">

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Nom du fichier</label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model.defer="name" placeholder="Nom du fichier">
                                <button class="btn btn-primary" wire:click="updateFile">Modifier</button>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button class="btn btn-secondary" wire:click="$set('file_id', 0)">Fermer</button>
                        <a href="{{ asset($file->folder) }}" target="_blank" class="btn btn-success" >Consulter</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="card-body mb-2">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:keydown.enter='searchFile'>
                    <button class="btn btn-primary btn-icon" wire:click="searchFile">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
                    </button>
                    @if ($search)
                        <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                        </button>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="height: 40rem">
                    <div class="card-header">
                        <h3 class="card-title">Fichiers</h3>
                    </div>
                    <div class="list-group list-group-flush card-body-scrollable card-body-scrollable-shadow">
                        @foreach ($fichiers as $fichier)
                            <div class="list-group-item list-group-item-action @if($file_id == $fichier->id) active @endif">
                                <div class="d-flex justify-content-between">
                                    <div class="word-wrap"> {{ $fichier->name }} </div>
                                    <div>
                                        <button class="btn btn-primary btn-icon" wire:click="editFile('{{ $fichier->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




