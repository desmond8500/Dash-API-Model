<div class="row">
    @component('components.tabler.header', ['title'=>'Article', 'subtitle'=>'Stock', 'breadcrumbs'=>$breadcrumbs])
    @endcomponent


    <div class="col-md-5 g-2">
        <div class="card p-2">
            @if ($form)
                @include('_tabler.stock.articleform')
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary me-auto" wire:click="$toggle('form', 0)">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="updateArticle()">Modifier</button>
                </div>
            @else
                <div class="row">
                    <div class="col-auto">
                        <img src="{{ asset($article->image) }}" alt="A" class="avatar avatar-xl">
                    </div>
                    <div class="col">
                        <div class="card-title">{{ $article->designation }}</div>
                        <div class="text-muted">{!! $article->description !!}</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-primary btn-icon" wire:click="editArticle('{{ $article->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                        </button>
                    </div>
                </div>

            @endif
        </div>
    </div>

    <div class="col-md-7 g-2">
        <div class="card ">
            <div class="card-header">
                <div class="card-title">Documents</div>
                <div class="card-actions">
                    <button class="btn btn-primary" disabled>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                      Document
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
