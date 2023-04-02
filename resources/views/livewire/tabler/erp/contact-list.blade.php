<div class="row">
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddContact">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Contact
        </button>
    </div>

    @foreach ($contact_list as $contact_item)
        <div class="col-md-6 g-2">
            @livewire('tabler.contact.contact-card', ['contact' => $contact_item], key($contact_item->id))
        </div>
    @endforeach

    @include('_tabler.modal',[
        'id' => "AddContact",
        'title' => "Ajouter un contact",
        'include' => "_tabler.erp.contact_add",
        'method' => "add_contact"
    ])
    <script> window.addEventListener('close-modal', event => { $("#AddContact").modal('hide'); }) </script>
</div>
