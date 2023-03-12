<div>
    @component('components.tabler.header', ['title'=>'Articles', 'subtitle'=>'Stock', 'breadcrumbs'=>$breadcrumbs])
    <div wire:loading>
        <div class="d-flex justify-content-between">
            <div><b>Chargement</b> <span class="animated-dots"></div>
            </div>
        </div>
        @if (!$form)
        <div class="btn-list">
            @livewire('tabler.stock.article-add')
                <button class="btn btn-primary" wire:click="$set('form', 1)" title="Ajouter un article">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                    Article
                </button>
                <button  class="d-none d-sm-block btn btn-primary" title="Importer des articles" wire:click="$set('form', 3)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path> <path d="M9 15l3 -3l3 3"></path> <path d="M12 12l0 9"></path> </svg>
                    Articles
                </button>
                <button  class="d-none d-sm-block btn btn-primary" title="exporter le modèle d'articles" wire:click="exportArticles">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4"></path> <path d="M12 13l0 9"></path> <path d="M9 19l3 3l3 -3"></path> </svg>
                    Articles
                </button>

            </div>
        @endif
    @endcomponent

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 g-2">
                    <div class="input-group">
                        <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher un article" wire:keydown.enter='getArticles'>
                        <button class="btn btn-primary btn-icon" wire:click="getArticles">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
                        </button>
                        @if ($search)
                            <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                            </button>
                        @endif
                    </div>
                </div>

                @foreach ($articles as $article)
                    <div class="col-md-6 g-2">
                        @include('_tabler.stock.article_card')
                    </div>
                @endforeach
                {{-- @if ($articles->count()>10) --}}
                    <div class="mt-2 card pt-3 ">{{ $articles->links() }}</div>
                {{-- @endif --}}
            </div>
        </div>
        <div class="col-md-3">
            @if ($form==1)
                <div class="card p-2" >
                    @include('_tabler.stock.articleform')

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary me-auto" wire:click="$toggle('form', 0)">Fermer</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="articleAdd()">Ajouter</button>
                    </div>
                </div>
            @elseif ($form==2)
                <div class="card p-2" >
                    @include('_tabler.stock.articleform')

                    <div class="modal-footer mt-2">
                        <div class="btn-list">
                            <button type="button" class="btn btn-icon btn-secondary me-auto" wire:click="$toggle('form', 0)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                            </button>
                            <button type="button" class="btn btn-danger btn-icon"  wire:click="deleteArticle()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                            </button>
                            <button type="button" class="btn btn-primary"  wire:click="updateArticle()">Modifier</button>
                        </div>
                    </div>
                </div>
            @elseif ($form==3)
                <div class="card card-body mb-3">
                    <div wire:loading>
                        <div class="d-flex justify-content-between">
                            <div><b>Chargement</b> <span class="animated-dots"></div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Fichier</label>
                        <div class="input-group">
                            <input type="file" class="form-control" wire:model.defer="file">
                            <button class="btn btn-primary" wire:click="import">Importer</button>
                        </div>
                        {{-- <textarea cols="30" rows="3" class="form-control" wire:model.defer='json' placeholder="Veuillez insérer un contenu en json"></textarea> --}}
                    </div>
                    <button type="button" class="btn btn-secondary me-auto" wire:click="$toggle('form', 0)">Fermer</button>
                </div>

            @else

                <div>
                @foreach ($list as $item)
                    <div class="btn-group mb-1">
                        <div class="btn " wire:click="use('storage/{{ $item }}')">
                            {{ basename(asset($item)) }}
                        </div>
                        <button class="btn btn-primary btn-icon" wire:click="delete('{{ $item }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                        </button>
                    </div>
                @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

