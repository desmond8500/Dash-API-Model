<div class="row ">
    <div class="col-md mb-3">
        <input type="search" wire:model.defer="search" class="form-control" value="Chercher">
    </div>
    <div class="col-auto mb-3">
        <button class="btn btn-primary" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
            Chercher
        </button>
    </div>
    <div class="col-auto mb-3">
        @livewire('tabler.erp.devis-add', ["projet_id"=>$projet_id])
    </div>
    <div class="col-md-12">
        @if (session()->has('message'))
            <div class="alert alert-success my-1">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-responsive bg-white">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-nowrap">Référence</th>
                    <th class="text-nowrap">Description</th>
                    <th class="text-nowrap">Statut</th>
                    <th class="text-nowrap">Montant</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devisList as $key => $devis)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>
                            <a href="{{ route('tabler.devis',['devis_id'=>$devis->id]) }}"> {{ $devis->reference }} </a>
                        </td>
                        <td>{{ $devis->description }}</td>
                        <td>
                            @livewire('tabler.status', ['status_id' => $devis->status ])
                        </td>
                        <td> @dump($devis->rows) </td>
                        <td>
                            <button class="btn btn-outline-secondary btn-icon disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                            </button>
                            <button class="btn btn-outline-danger btn-icon" wire:click="deleteInvoice('{{ $devis->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
