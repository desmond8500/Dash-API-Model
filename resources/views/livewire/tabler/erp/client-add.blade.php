<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        Client
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form wire:submit.prevent="store_client">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label required">Nom du client</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label required">Description du client</label>
                        <textarea class="form-control" wire:model.defer="description"  cols="30" rows="3"></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>

                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</div>

<script>
    document.addEventListener('livewire:load', function () {

            // Your JS here.

        })

</script>
