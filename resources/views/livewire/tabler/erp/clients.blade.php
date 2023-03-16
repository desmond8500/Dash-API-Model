<div>
    <div>
        @component('components.tabler.header', ['title'=>'Clients', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
            @livewire('tabler.erp.client-add')
        @endcomponent
    </div>

    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="input-group">
                <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:keydown.enter='getClients'>
                <button class="btn btn-primary btn-icon" wire:click="getClients">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
                </button>
                @if ($search)
                    <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                    </button>
                @endif
            </div>
        </div>
        @foreach ($clients as $key => $client)
        <div class="col-md-3 mb-2">
            @livewire('tabler.erp.client-card', ['client' => $client], key($key))
        </div>
        @endforeach
    </div>
    <div class="mt-3">
        {{ $clients->links() }}
    </div>

</div>
