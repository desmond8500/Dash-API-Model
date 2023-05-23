<div>
    @component('components.tabler.header', [
        'title' => 'Achats',
        'subtitle' => 'Stock',
        'breadcrumbs' => $breadcrumbs,
    ])
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAchat">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Achat
        </button>
    @endcomponent

    <div class="row">
        <div class="col-md-8">
            @if ($achats->count())
                <div class="table-responsive bg-white">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Achat</th>
                                <th>HT/TVA</th>
                                <th>Montant TTC</th>
                                <th width="105px">Date</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($achats as $key => $achat)
                                <tr class="">
                                    <th>{{ $key+1 }}</th>
                                    <td scope="row">
                                        <a href="{{ route('tabler.achat',['achat_id'=>$achat->id]) }}">
                                            <div class="fw-bold">{{ $achat->name }}</div>
                                            <div class="text-muted">{{ $achat->description }}</div>
                                        </a>
                                    </td>
                                    <td>
                                        <div>{{ number_format($achat->total($achat->id), 0, ',', ' ') }} F</div>
                                        <div class="text-muted">{{ number_format($achat->tva*$achat->total($achat->id), 0, ',', ' ') }} F</div>
                                    </td>
                                    <td>
                                        {{ number_format($achat->total($achat->id)+$achat->tva*$achat->total($achat->id), 0, ',', ' ') }} F
                                    </td>
                                    <td>
                                        <div>{{ $achat->date->format('d-m-Y') }}</div>

                                        <a href="" class="badge bg-blue">
                                            {{ $achat->factures()->count() }} Factures
                                        </a>


                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <button class="btn btn-primary btn-icon" title="Modifier" wire:click="editAchat('{{ $achat->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                            </button>
                                            {{-- <button class="btn btn-primary btn-icon"  title="Facture">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path> <path d="M9 9l1 0"></path> <path d="M9 13l6 0"></path> <path d="M9 17l6 0"></path> </svg>
                                            </button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            @if ($achat_id)
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Modifier un Achat</div>
                    </div>
                    <div class="card-body">
                        @include('_tabler.stock.achatform')
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-secondary me-auto" wire:click="$set('achat_id',0)">Fermer</button>
                        <button type="button" class="btn btn-danger btn-icon" wire:click="deleteAchat()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                        </button>
                        <button type="button" class="btn btn-primary" wire:click="updateAchat()">Modifier</button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('_tabler.modal',[
        'id' => "addAchat",
        'title' => "Ajouter un achat",
        'include' => "_tabler.stock.achatform",
        'method' => "addAchat"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addAchat").modal('hide'); }) </script>
</div>
