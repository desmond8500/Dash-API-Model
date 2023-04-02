<div class="row">
    <div class="col g-2">
        <div class="input-group">
            <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:keydown.enter='getDevis'>
            <button class="btn btn-primary btn-icon" wire:click="getDevis">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
            </button>
            @if ($search)
                <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                </button>
            @endif
        </div>
    </div>
    <div class="col-auto g-2">
        @livewire('tabler.erp.devis-add', ["projet_id"=>$projet_id])
    </div>
    <div class="col-md-12">
        @if (session()->has('message'))
            <div class="alert alert-success my-1">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            @foreach ($devisList as $key => $devis)
                <div class="col-md-6 g-2">
                    <div class="card">
                        <div class="p-2">
                            @if ($devis->id == $devis_id)
                                <form class="row" wire:submit.prevent='update_invoice'>
                                    @include('_tabler.erp.devis_form')
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <a class="btn me-auto btn-secondary" wire:click="$set('devis_id',0)">Fermer</a>
                                            <button type="submit" class="btn btn-primary" >Modifier</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="d-flex justify-content-between" wire:click="gotoDevis('{{ $devis->id }}')" type="button">
                                    <div class="card-title">{{ $devis->reference }}</div>
                                    @livewire('tabler.status', ['status_id' => $devis->status ], key($devis->id))
                                </div>
                                <div class="row">
                                    <div class="col" wire:click="gotoDevis('{{ $devis->id }}')" type="button">
                                        <div class="text-muted">{{ $devis->description }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-outline-secondary btn-icon" wire:click="edit_invoice('{{ $devis->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                        </button>
                                        {{-- <button class="btn btn-outline-danger btn-icon" wire:click="deleteInvoice('{{ $devis->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                        </button> --}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>


</div>
