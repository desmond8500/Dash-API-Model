<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">Systèmes</div>
                <div class="card-actions">
                    @livewire('tabler.erp.system-add', ['projet_id' => $projet_id])
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($systems as $system)
                        @if ($system_id == $system->id)
                            <form wire:submit.prevent='update_system'>
                                @include('_tabler.erp.system_form')
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-secondary" >Fermer</button>
                                    <button class="btn btn-danger" >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                    </button>
                                    <button class="btn btn-primary" type="submit">Modifier</button>
                                </div>
                            </form>
                        @else
                            <div class="col">
                                {{ $system->name }}
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-icon" wire:click="edit_system('{{ $system->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>


    </div>

    <div class="col-md-6">
        @if ($form)
            <div class="mb-3">
                <div wire:loading class="mb-3">
                    <div class="d-flex justify-content-between">
                        <div>Chargement <span class="animated-dots"></div>
                    </div>
                </div>
                {{-- <label class="form-label">Fichier</label> --}}
                <div class="input-group">
                    <input type="file" class="form-control" wire:model.defer="files" multiple>
                    <button class="btn btn-primary" wire:click='Ajouter'>Ajouter</button>
                </div>
            </div>
        @endif
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
                <div class="row">
                    @foreach ($projet->fichiers as $fichier)
                        <a href="{{ asset($fichier->folder) }}" target="_blank" class="btn btn-primary mb-1" >{{ $fichier->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
