<div class="col-md-5 mb-3">
    <label class="form-label required">Nom du Destinataire </label>
    <input type="text" class="form-control" wire:model.defer="report_name" placeholder="Nom du destinataire">
    @error('report_name') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-5 mb-3">
    <label class="form-label required">Email Destinataire </label>
    <input type="mail" class="form-control" wire:model.defer="report_mail" placeholder="Email">
    @error('report_mail') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-2 mb-3">
    <div class="form-label">_</div>
    <a class="btn btn-primary" wire:click="add_mail">
      Ajouter
    </a>
</div>

<div class="col">
    <div class="btn-list">
        @foreach ($mails as $key => $cc)
            <a class="btn btn-primary" wire:click="remove_contact('{{ $key }}')">{{ $cc['name'] }} {{ $cc['email'] }}</a>
        @endforeach
    </div>
</div>

<div class="col-auto">
    <div class="dropdown">
        <a class="btn btn-primary" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M6 9l6 6l6 -6"></path> </svg>
            Sélectionner
        </a>

        <div class="dropdown-menu" aria-labelledby="triggerId">
            @foreach ($report->contacts as $contact)
                <a class="dropdown-item" wire:click="add_contact('{{ $contact->id }}')">{{ $contact->firstname }} {{ $contact->lastname }} 1</a>
            @endforeach
        </div>
    </div>
</div>
