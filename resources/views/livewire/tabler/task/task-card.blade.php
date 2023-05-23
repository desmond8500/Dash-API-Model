<div>
    <div class="row border-bottom py-2">
        <div class="col-md-12 mb-2">
            <div class="d-flex justify-content-between">
                <div class="fw-bold">
                    <a href="{{ route('tabler.projet',['projet_id'=>$tache->projet->id]) }}" class="text-dark">
                        {{ $tache->projet->name }}
                    </a>
                    @if ($tache->room_id)
                        / <a href="{{ route('tabler.building',['building_id'=>$tache->building->id]) }}" class="text-dark">
                            {{ $tache->building->name }}
                        </a>
                        / {{ $tache->stage->name }}
                        / <a href="{{ route('tabler.room',['room_id'=>$tache->room->id]) }}" class="text-dark">
                            {{ $tache->room->name }}
                        </a>
                    @endif
                </div>
                <div class="text-end">
                    @if ($tache->priority_id == 1)
                        <span class="badge bg-blue">Basse</span>
                    @elseif($tache->priority_id == 2)
                        <span class="badge bg-orange">Moyenne</span>
                    @elseif($tache->priority_id == 3)
                        <span class="badge bg-red">Haute</span>
                    @endif
                </div>
            </div>
        </div>

        <a class="col" type="button" wire:click="gotoTask('{{ $tache->id }}')">
            <div class="fw-bold">{{ $tache->objet }}</div>
            <div class="text-muted">{!! nl2br($tache->description) !!}</div>
        </a>
        <div class="col-auto">

            <button class="btn btn-outline-secondary btn-icon" data-bs-toggle="modal" data-bs-target="#showTask{{ $tache->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path> <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path> </svg>
            </button>
            <button class="btn btn-outline-secondary btn-icon" data-bs-toggle="modal" data-bs-target="#editTask{{ $tache->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
            </button>
        </div>
    </div>

    <div class="modal modal-blur fade" id="showTask{{ $tache->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <h3>{{ $tache->objet }}</h3>
                        <div>
                            @livewire('tabler.status', ['status_id' => $tache->status_id], key($tache->id))
                        </div>
                    </div>

                    <div class="text-muted">{!! nl2br($tache->description) !!}</div>
                    <hr class="mt-2">
                    @foreach ($tache->photos as $photo)
                        <a data-fslightbox href="{{ asset($photo->folder) }}">
                            <img src="{{ asset($photo->folder) }}" alt="A" class="avatar avatar-xl">
                        </a>
                    @endforeach
                    {{-- <div id="lightgallery">
                        @foreach ($tache->photos as $photo)
                            <a href="{{ asset($photo->folder) }}">
                                <img src="{{ asset($photo->folder) }}" alt="A" class="avatar avatar-xl">
                            </a>
                        @endforeach
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="taskUpdate()">Modifier</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="editTask{{ $tache->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editer tache</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @include('_tabler.erp.task_form')
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="taskUpdate()">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>
