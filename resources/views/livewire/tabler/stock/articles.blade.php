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
                <button  class="d-none d-sm-block btn btn-primary" title="Importer des articles" wire:click="$set('form', 3)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path> <path d="M9 15l3 -3l3 3"></path> <path d="M12 12l0 9"></path> </svg>
                    Articles
                </button>
                <button  class="d-none d-sm-block btn btn-primary" title="exporter le modèle d'articles" wire:click="exportArticles">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4"></path> <path d="M12 13l0 9"></path> <path d="M9 19l3 3l3 -3"></path> </svg>
                    Articles
                </button>
                <button  class="d-none d-sm-block btn btn-primary" title="exporter le modèle d'articles" wire:click="get_server_articles">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4"></path> <path d="M12 13l0 9"></path> <path d="M9 19l3 3l3 -3"></path> </svg>
                    import
                </button>
            </div>
        @endif
    @endcomponent

    <div class="row">
        <div class="col-md-12">
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
                    <div class="col-md-4 g-2">
                        @include('_tabler.stock.article_card')
                    </div>
                @endforeach
                {{-- @if ($articles->count()>10) --}}
                    <div class="mt-2 card pt-3 ">{{ $articles->links() }}</div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>

