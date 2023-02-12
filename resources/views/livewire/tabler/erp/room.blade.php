<div>
    @component('components.tabler.header', ['title'=>'Room', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        @livewire('tabler.task.task-add', ['room_id' => $room->id], key($room->id))
    @endcomponent


    <div class="row">
        <div class="col-md-6 offset-6">
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
