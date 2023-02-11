<div>
    @component('components.tabler.header', ['title'=>'Articles', 'subtitle'=>'Stock', 'breadcrumbs'=>$breadcrumbs])
        {{-- @livewire('tabler.stock.article-add') --}}
        @if (!$form)
            <button class="btn btn-primary" wire:click="$toggle('form', 1)">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                Article
            </button>
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
                                    <div class="card-title">{{ $article->designation }}</div>
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
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="updateArticle()">Modifier</button>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

