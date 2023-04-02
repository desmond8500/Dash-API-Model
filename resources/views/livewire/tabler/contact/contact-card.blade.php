<div class="card p-2">
    <div class="row">
        @if ($contact_id == $contact->id)
            <form wire:submit.prevent="update_contact" class="row">
                @include('_tabler.erp.contact_form')
                <div class="col-md-12 d-flex justify-content-between">
                    <a class="btn btn-secondary" wire:click="$set('contact_id', 0)">Fermer</a>
                    <a class="btn btn-danger btn-icon" wire:click="delete_contact('{{ $contact->id }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                    </a>
                    <button class="btn btn-primary" >Modifier</button>
                </div>
            </form>
        @else
            <div class="col-auto">
                <img src="" alt="A" class="avatar avatar-md">
            </div>
            <div class="col">
                <div class="card-title">{{ $contact->firstname }} {{ $contact->lastname }}</div>
                <div class="text-muted">{!! nl2br($contact->description) !!}</div>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary btn-icon" wire:click="edit_contact('{{ $contact->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                </button>
            </div>
            <div class="col-md-12">
                @foreach ($contact->tels as $tel)
                    <div class="row border-top my-1 p-2">
                        <div class="col-auto"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path> </svg> </div>
                        <div class="col">{{ $tel->tel }}</div>
                        <a class="text-danger col-auto" wire:click="delete_tel('{{ $tel->id }}')" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                        </a>
                    </div>
                @endforeach
                @foreach ($contact->emails as $email)
                    <div class="row border-top my-1 p-2">
                        <div class="col-auto"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path> <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path> </svg> </div>
                        <div class="col">{{ $email->email }}</div>
                        <a class="text-danger col-auto" wire:click="delete_tel('{{ $email->id }}')" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
