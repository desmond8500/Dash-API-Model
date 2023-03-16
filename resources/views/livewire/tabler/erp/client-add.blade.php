<div>
    <div class="btn-list">
        @include('_tabler.toast', ['message'=>'Le client a été ajouté'])
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                Client
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal modal-blur fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form wire:submit.prevent="store_client">
                <div class="row">
                    @include('_tabler.erp.client_form')

                    <div class="modal-footer p-0">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" >Ajouter</button>
                    </div>

                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event => { $("#addModal").modal('hide'); })
        </script>
    @endpush
</div>
