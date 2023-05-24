<div>
    @component('components.tabler.header', ['title'=> 'Personnes', 'subtitle'=> 'CV'])
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                Personne
            </button>

            <div class="modal modal-blur fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter une personne</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                @include('_cv.form.person_form')

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="store_person()">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    @endcomponent


    <div class="row">
        @foreach ($personnes as $personne)
            <div class="col-md-4">
                <a type="button" class="card p-2 mb-2" href="{{ route('cv.personne',['id'=>$personne->id]) }}">
                    <div class="row">
                        <div class="col-auto">
                            <img src="" alt="A" class="avatar avatar-md">
                        </div>
                        <div class="col-md">
                            {{ $personne->prenom }} {{ $personne->nom }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
