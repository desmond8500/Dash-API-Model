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
            <div class="mb-3">
                <label class="form-label">Fichier</label>
                <div class="input-group">
                    <input type="file" class="form-control" wire:model.defer="files" >
                    <button class="btn btn-primary" >Ajouter</button>
                </div>
            </div>
        </div>
    </div>

</div>
