 <div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Liste des taches</div>
            </div>
            <div class="card-body">
                @foreach ($taches as $tache)
                    @livewire('tabler.task.task-card', ['tache' => $tache], key($tache->id))
                    <div wire:click="getTask('{{ $tache->id }}')" class="text-end" type>Consulter</div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-8">
        @if ($task)
            @dump($task)
        @endif
    </div>
</div>
