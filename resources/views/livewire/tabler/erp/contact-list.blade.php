<div class="row">
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddContact">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Contact
        </button>
    </div>

    @foreach ($contacts as $contact)
        <div class="col-md-4">
            <div class="card p-2">
                <div class="row">
                    @if ($contact_id == $contact->id)
                        @include('_tabler.erp.contact_form')
                        <div class="col-md-12 d-flex justify-content-between">
                            <a class="btn btn-secondary" >Fermer</a>
                            <button class="btn btn-primary" >Modifier</button>
                        </div>
                    @else
                        <div class="col-auto">
                            <img src="" alt="A" class="avatar avatar-md">
                        </div>
                        <div class="col">
                            <div class="card-title">{{ $contact->firstname }} {{ $contact->lastname }}</div>
                            <div class="text-muted">{!! nl2br($contact->description) !!}</div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-primary btn-icon" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach


    @include('_tabler.modal',[
        'id' => "AddContact",
        'title' => "Ajouter un contact",
        'include' => "_tabler.erp.contact_form",
        'method' => "add_contact"
    ])
    <script> window.addEventListener('close-modal', event => { $("#AddContact").modal('hide'); }) </script>
</div>
