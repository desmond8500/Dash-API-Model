<div>
    <div class="card p-2">

        <div class="row border-bottom pb-2">
            <div class="col-auto">
                <img src="" alt="A" class="avatar avatar-md">
            </div>
            <div class="col">
                <div class="card-title">{{ $stage->name }}</div>
                <div class="text-muted text-truncate">{{ nl2br($stage->description) }}</div>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#addRoom{{ $stage->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                </a>
                <button class="btn btn-outline-primary btn-icon" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                </button>
            </div>
        </div>

        <div>
            @foreach ($stage->rooms as $room)
                <a class="d-flex justify-content-between bg-secondary rounded text-light p-1 my-1" type="button" href="{{ route('tabler.room',['room_id'=>$room->id]) }}">
                    <div>
                        {{ $room->name }}
                    </div>
                    <div>

                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="modal modal-blur fade" id="addRoom{{ $stage->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un local {{ $stage_id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model.defer="name"/>
                            </div>
                            <div>
                                <label class="form-label">Description</label>
                                <textarea class="form-control" wire:model.defer="description"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="roomAdd()">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
