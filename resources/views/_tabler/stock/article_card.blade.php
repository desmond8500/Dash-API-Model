<div class="card p-2">
    <div class="row">
        <div class="col-auto" type='button' wire:click="gotoArticle('{{ $article->id }}')">
            <img src="{{ asset($article->image) ?? asset($img) }}" alt="A" class="avatar avatar-xl">
        </div>
        <div class="col" type='button' wire:click="gotoArticle('{{ $article->id }}')">
            <div class="fw-bold" style="font-size: 15px; height: 40px">{{ $article->designation }} </div>
            <div class="d-flex justify-content-between">
                <div class="text-muted">{{ $article->reference }}</div>
                <div class="fw-bold">{{ $article->quantity }}</div>
            </div>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path> <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path> <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path> </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a  wire:click="editArticle('{{ $article->id }}')" class="dropdown-item">Modifier</a>
                    <a href="#" class="dropdown-item text-danger" disabled>Supprimer</a>
                </div>
            </div>



        {{-- <button class="btn btn-outline-primary btn-icon" wire:click="editArticle('{{ $article->id }}')">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
        </button> --}}
    </div>
    </div>
</div>
