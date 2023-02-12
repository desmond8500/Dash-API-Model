 <div class="row">
    <div class="col-md-6">
        @if ($task)
            @dump($task)
        @endif
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
            </div>
        </div>
    </div>
</div>
