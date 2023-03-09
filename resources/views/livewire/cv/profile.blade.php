<div class="card">
    <div class="card-body">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-lg" style="background-image: url(./static/avatars/002m.jpg)"></span>
            </div>
            <div class="col">
                <h4 class="card-title m-0">
                    <a href="#">{{ $person->prenom }} {{ $person->nom }}</a>
                </h4>
                <div class="text-muted"> {{ $person->email }} </div>
                <div class="text-muted"> {{ $person->tel }} </div>
                <div class="text-muted"> {{ $person->adresse }} </div>
                <div class="small mt-1">
                    <span class="badge bg-green"></span> Online
                </div>
            </div>

            <div class="col-auto">
                <div class="dropdown">
                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <circle cx="12" cy="12" r="1" /> <circle cx="12" cy="19" r="1" /> <circle cx="12" cy="5" r="1" /> </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a wire:click="edit" class="dropdown-item">Editer</a>
                        <a href="#" class="dropdown-item text-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal-blur fade" id="editProfile" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="update">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier le profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @include('_cv.form.person_form')

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" >Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('open-modal', event => {
            $("#editProfile").modal('show');
        })
        window.addEventListener('close-modal', event => {
            $("#editProfile").modal('hide');
        })
    </script>
</div>
