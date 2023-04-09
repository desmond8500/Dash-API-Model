{{-- <div class="input-group">
    <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:keydown.enter='getContacts'>
    <button class="btn btn-primary btn-icon" wire:click="getContacts">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
    </button>
    @if ($search)
        <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
        </button>
    @endif
</div> --}}
@foreach ($contacts as $contact)
    <div class="row border rounded p-2 m-1">
        <div class="col-auto">
            <img src="" alt="A" class="avatar avatar-md">
        </div>
        <div class="col">
            <div class="card-title">{{ $contact->firstname }} {{ $contact->lastname }}</div>
            <div class="text-muted">{!! nl2br($contact->description) !!}</div>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary btn-icon" wire:click="add_contact('{{ $contact->id }}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 5l0 14"></path> <path d="M5 12l14 0"></path> </svg>
            </button>
        </div>
    </div>
@endforeach

