<div>
    @component('components.tabler.header', ['title'=>'Room', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        @livewire('tabler.task.task-add', ['room_id' => $room->id], key($room->id))
    @endcomponent


    @livewire('tabler.task.task-projet-list', ['taches'=> $taches])

    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des taches</div>
                </div>
                <div class="card-body">
                    @foreach ($taches as $tache)
                        <div class="row border-bottom pb-2">
                            <div class="col-auto">
                                <button class="btn btn-icon" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-dotted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7.5 4.21l0 .01"></path> <path d="M4.21 7.5l0 .01"></path> <path d="M3 12l0 .01"></path> <path d="M4.21 16.5l0 .01"></path> <path d="M7.5 19.79l0 .01"></path> <path d="M12 21l0 .01"></path> <path d="M16.5 19.79l0 .01"></path> <path d="M19.79 16.5l0 .01"></path> <path d="M21 12l0 .01"></path> <path d="M19.79 7.5l0 .01"></path> <path d="M16.5 4.21l0 .01"></path> <path d="M12 3l0 .01"></path> </svg>
                                </button>
                            </div>
                            <div class="col">
                                <div class="fw-bold">{{ $tache->objet }}</div>
                                <div class="text-muted">{{ nl2br($tache->description) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-8">
        </div>
    </div> --}}

</div>
