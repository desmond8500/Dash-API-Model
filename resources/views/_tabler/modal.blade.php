<div class="modal modal-blur fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="{{ $method }}">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @include($include)
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" >Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
