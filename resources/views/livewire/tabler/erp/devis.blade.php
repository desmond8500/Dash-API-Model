<div>

    @component('components.tabler.header', ['title'=>'Devis', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addArticle">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Article
        </button>
        <button type="button" class="btn btn-primary" wire:click="$set('article_form', 1)">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Importer
        </button>
    @endcomponent

    <div class="row">
        <div class="col-md-8">
            <table class="table table-responsive bg-white table-vcenter">
                <thead>
                    <tr>
                        <th class="text-nowrap">Désignation</th>
                        <th class="text-center">Quantité</th>
                        <th class="text-center">Prix</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Marge</th>
                        <th class="text-nowrap" width="50px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($champs as $key => $devis)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $devis->name }}</div>
                                <div class="text-muted">
                                    @if ($devis->article_id)
                                        <a href="{{ route('tabler.article',['article_id'=>$devis->article_id]) }}" target="_blank">
                                            {{ $devis->reference }}
                                        </a>
                                    @else
                                        {{ $devis->reference }}
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <div>{{ $devis->quantity }}</div>
                                <div class="text-muted">{{ $devis->coef }}</div>
                            </td>
                            <td class="text-center">
                                <div>{{ $devis->price*$devis->coef }}</div>
                                <div>{{ $devis->price }}</div>
                            </td>
                            <td class="text-center">
                                <div>{{ $devis->price * $devis->coef * $devis->quantity  }}</div>
                                <div>{{ $devis->price * $devis->quantity  }}</div>
                            </td>
                            <td class="text-center">{{ $devis->price * $devis->quantity * ($devis->coef-1)   }}</td>
                            <td>
                                <button class="btn btn-primary btn-icon" wire:click="editRow('{{ $devis->id }}')" title="Editer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot style="font-size:15px" class="fw-bold">
                    <tr>
                        <td colspan="2">TOTAL</td>
                        <td colspan="3" class="text-end">
                            {{ number_format($total, 0, ',', ' ') }} F
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-4">
            @if ($article_form==1)
                <div class="input-group mb-1">
                    <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:keydown.enter='getArticles'>
                    <button class="btn btn-primary btn-icon" wire:click="getArticles">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
                    </button>
                    @if ($search)
                        <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                        </button>
                    @endif
                </div>
                @foreach ($articles as $article)
                    <div class="mb-1">
                        @include('_tabler.stock.achat_article_card')
                    </div>
                @endforeach
                <div class="card pt-3">
                    {{ $articles->links() }}
                </div>
            @elseif($article_form==2)
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Modifier un champ</div>
                    </div>
                    <div class="card-body">
                        @include('_tabler.erp.devis_row_form')
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-secondary me-auto" wire:click="$set('article_form',0)">Fermer</button>
                        <button type="button" class="btn btn-danger btn-icon" wire:click="deleteRow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                        </button>
                        <button type="button" class="btn btn-primary" wire:click="updateRow">Modifer</button>
                    </div>
                </div>
            @else

                <div class="card mb-2">
                    <div class="card-header">
                        <div class="card-title">Acomptes</div>
                        <div class="card-actions">
                            <button class="btn btn-primary" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                            Ajouter
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-header">
                        <div class="card-title">Dépenses</div>
                        <div class="card-actions">
                            <button class="btn btn-primary" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                            Ajouter
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-header">
                        <div class="card-title">Modalités</div>
                        <div class="card-actions">
                            <button class="btn btn-outline-secondary btn-icon disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-header">
                        <div class="card-title">Notes</div>
                        <div class="card-actions">
                            <button class="btn btn-outline-secondary btn-icon disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>

            @endif




        </div>
    </div>
</div>
