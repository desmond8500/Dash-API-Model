 <div >
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
            <div class="mt-3 d-flex justify-content-between">
                <div>
                    {{ $taches->links() }}
                </div>
                <div>
                    <button class="btn btn-primary" wire:click="$toggle('task_toggle')">
                        @if ($this->task_toggle)
                            Taches Terminés
                        @else
                            Taches en Cours
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
