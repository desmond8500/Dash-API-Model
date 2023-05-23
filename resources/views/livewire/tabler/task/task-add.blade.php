<div>
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        Tache
    </button>

    <div class="modal modal-blur fade" id="addTask" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore:self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="taskAdd" >
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter une tache </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            @include('_tabler.erp.task_form')
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script> window.addEventListener('close-modal', event => { $("#addTask").modal('hide'); }) </script>
