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

