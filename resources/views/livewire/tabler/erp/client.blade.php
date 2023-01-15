<div>
    <div>
        @component('components.tabler.header', ['title'=>'Clients', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
            @livewire('tabler.erp.projet-add', ['client_id' => $client_id])
        @endcomponent
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-2">
                <h3 class="fw-bold">{{ $client->name }}</h3>
                <div class="text-muted">
                    {!! nl2br($client->description) !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach ($projets as $projet)
                    <div class="col-md-6 mb-2">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-auto" wire:click="gotoProjet('{{ $projet->id }}')" type='button'>
                                    <img src="" alt="A" class="avatar">
                                </div>
                                <div class="col" wire:click="gotoProjet('{{ $projet->id }}')" type='button'>
                                    <div class="fw-bold">{{ $projet->name }}</div>
                                    <div class="text-muted">{!! nl2br($projet->description) !!} </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-outline-secondary btn-icon disabled">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
