<div>
    @component('components.tabler.header', ['title'=>'Articles', 'subtitle'=>'Stock', 'breadcrumbs'=>$breadcrumbs])
        {{-- @livewire('tabler.stock.article-add') --}}
        @if (!$form)
            <div class="btn-list">
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
        <div class="col-md-8">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6 g-2">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-auto" type='button' wire:click="gotoArticle('{{ $article->id }}')">
                                    <img src="{{ $article->image }}" alt="A" class="avatar avatar-md">
                                </div>
                                <div class="col" type='button' wire:click="gotoArticle('{{ $article->id }}')">
                                    <div class="card-title">{{ $article->designation }} </div>
                                    <div class="text-muted">{!! $article->description !!}</div>
                                </div>
                                <div class="col-auto">
                                <button class="btn btn-outline-primary btn-icon" wire:click="editArticle('{{ $article->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-2">{{ $articles->links() }}</div>
            </div>
        </div>
        <div class="col-md-4">
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
                        <button type="button" class="btn btn-secondary me-auto" wire:click="$toggle('form', 0)">Fermer</button>
                        <div class="btn-list">
                            <button type="button" class="btn btn-danger"  wire:click="deleteArticle()">Supprimer</button>
                            <button type="button" class="btn btn-primary"  wire:click="updateArticle()">Modifier</button>
                        </div>
                    </div>
                </div>
            @elseif ($form==3)
                <div class="col-md-12 mb-3">
                    <label class="form-label">Fichier</label>
                    {{-- <div class="input-group">
                        <input type="file" class="form-control" wire:model.defer="file">
                    </div> --}}
                    <textarea cols="30" rows="3" class="form-control" wire:model.defer='json' placeholder="Veuillez insérer un contenu en json"></textarea>

                </div>
                <button class="btn btn-primary" wire:click="import">Importer</button>
                <button type="button" class="btn btn-secondary me-auto" wire:click="$toggle('form', 0)">Fermer</button>

            @endif

           <div>
            @foreach ($list as $item)
                <div class="btn-group ">
                    <div class="btn " wire:click="use('storage/{{ $item }}')">
                        {{ basename(asset($item)) }}
                    </div>
                    <button class="btn btn-primary btn-icon" wire:click="delete('{{ $item }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                    </button>
                </div>
            @endforeach
           </div>

        </div>
    </div>
    @dump($file)
</div>

