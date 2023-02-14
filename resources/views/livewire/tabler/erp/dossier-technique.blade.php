<div class="row">
    <div class="col-md-6">
        @livewire('tabler.erp.system-add', ['projet_id' => $projet_id])
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
