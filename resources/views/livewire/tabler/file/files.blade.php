<div>
    @component('components.tabler.header', ['title'=>'Fichiers', 'subtitle'=>'Fichiers', 'breadcrumbs'=>$breadcrumbs])
        <button class="btn btn-primary" >
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
          Fichier
        </button>
    @endcomponent

    <div class="row">
        <div class="col-md-8">

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title fw-bold">Fichiers</div>
                    <div class="card-actions">
                        <button class="btn btn-primary" wire:click="$set('form',true)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                            Fichier
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:model.defer="search">
                                <button class="btn btn-primary" wire:click="searchFile">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($fichiers as $fichier)
                            <a href="{{ asset($fichier->folder) }}" target="_blank" class="btn btn-primary mb-1" >{{ $fichier->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
