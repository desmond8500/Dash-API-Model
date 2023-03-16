<div >
    <div class="card p-2">
        <div class="row">
            @if ($edit)
                <form wire:submit.prevent='updateProjet'>
                    @include('_tabler.erp.projet_form')
                    <div class="col-md-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" wire:click="$set('edit', false)">Fermer</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            @else
                <a class="col-auto" href="{{ route('tabler.projet', ['projet_id' => $projet->id]) }}" >
                    <img src="" alt="A" class="avatar">
                </a>
                <a class="col" type="button" href="{{ route('tabler.projet', ['projet_id' => $projet->id]) }}" >
                    <div class="fw-bold">{{ $projet->name }}</div>
                    <div class="text-muted">{!! nl2br($projet->description) !!} </div>
                </a>
                <div class="col-auto">
                    <button class="btn btn-outline-secondary btn-icon" wire:click="$set('edit', true)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                    </button>
                </div>
            @endif
        </div>
    </div>

</div>
