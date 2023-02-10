<div>
    @component('components.tabler.header', ['title'=>'Room', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        @livewire('tabler.task.task-add', ['room_id' => $room->id], key($room->id))
    @endcomponent

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des taches</div>
                </div>
                <div class="card-body">
                    @foreach ($taches as $tache)
                        <div class="btn w-100">
                            <div>{{ $tache->objet }}</div>
                            <div>{{ nl2br($tache->description) }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>

</div>
