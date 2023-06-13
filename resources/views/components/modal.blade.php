<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $id ?? 'exampleModal' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        {{ $button_name ?? 'button_name'}}
    </button>

    <div class="modal modal-blur fade" id="{{ $id ?? 'exampleModal' }}" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent='{{ $method ?? 'ajouter' }}'>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $title ?? 'modal_title' }}</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        {{ $slot }}
                        {{ $test }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" >{{ $submit ?? 'Ajouter' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>