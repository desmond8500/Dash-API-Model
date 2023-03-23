<div>
    @component('components.tabler.header', ['title'=>'Fournisseurs', 'subtitle'=>'Stock', 'breadcrumbs'=>$breadcrumbs])
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProvider">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Fournisseur
        </button>
    @endcomponent

    <div class="row">
        @foreach ($providers as $provider)
            <div class="col-md-4">
                <div class="card p-2">
                    <div class="row">
                        @if ($provider_id == $provider->id)
                            <form  wire:submit.prevent='update_provider'>
                                @include('_tabler.stock.provider_form')
                                <div class="mt-3">
                                    <button type="button" class="btn btn-secondary me-auto" wire:click="$set('provider_id', 0)">Fermer</button>
                                    <button type="submit" class="btn btn-primary" >Modifier</button>
                                </div>
                            </form>
                        @else
                            <div class="col-auto">
                                <img src="" alt="A" class="avatar avatar-md">
                            </div>
                            <div class="col">
                                <div class="card-title">{{ $provider->name }}</div>
                                <div class="text-muted">{!! nl2br($provider->description) !!}</div>
                            </div>
                            <div class="col-auto">
                            <button class="btn btn-outline-primary btn-icon" wire:click="edit_provider('{{ $provider->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                            </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <div class="modal modal-blur fade" id="addProvider" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent='add_provider'>
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un fournisseur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       @include('_tabler.stock.provider_form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" >Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script> window.addEventListener('close-modal', event => { $("#addProvider").modal('hide'); }) </script>
</div>
