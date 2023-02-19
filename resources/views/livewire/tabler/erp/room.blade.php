<div>
    @component('components.tabler.header', ['title'=>'Room', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        <div class="btn-list">
            @livewire('tabler.task.task-add', ['room_id' => $room->id], key($room->id))

        </div>
    @endcomponent

    <div class="row">
        <div class="col-md-6">
            @if ($form)
            <div class="mb-3">
                <div wire:loading class="mb-3">
                    <div class="d-flex justify-content-between">
                        <div>Chargement <span class="animated-dots"></div>
                    </div>
                </div>
                {{-- <label class="form-label">Fichier</label> --}}
                <div class="input-group">
                    <input type="file" class="form-control" wire:model.defer="files" multiple>
                    <button class="btn btn-primary" wire:click='Ajouter'>Ajouter</button>
                </div>
            </div>

            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title fw-bold">Fichiers</div>
                    <div class="card-actions">
                        <button class="btn btn-primary" wire:click="$set('form',true)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                            Fichier
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="lightgallery">
                        @foreach ($images as $image)
                            <a href="{{ asset($image->folder) }}" class="avatar avatar-md">
                                <img alt="{{ basename($image->folder) }}" src="{{ asset($image->folder) }}" />
                            </a>
                        @endforeach
                    </div>

                    <table class="table table-hover">
                        @foreach ($fichiers as $fichier)
                        <tr>
                            <td>
                                <div class="row ">
                                    <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path> <path d="M9 9l1 0"></path> <path d="M9 13l6 0"></path> <path d="M9 17l6 0"></path> </svg>
                                    </div>
                                    <a href="{{ asset($fichier->folder) }}" target="_blank" class="col" >{{ $fichier->name }}</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des taches</div>
                    <div class="card-actions">
                        @livewire('tabler.task.task-add', ['room_id' => 0, 'projet_id'=> $projet_id])
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($taches as $tache)
                        @livewire('tabler.task.task-card', ['tache' => $tache], key($tache->id))
                    @endforeach
                    <div class="mt-2">
                        {{ $taches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
