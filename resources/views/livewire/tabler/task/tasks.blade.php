<div class="row">
    @component('components.tabler.header', ['title'=>'Taches', 'subtitle'=>'Taches', 'breadcrumbs'=>$breadcrumbs])
    @endcomponent


     <div class="col-md-7 mb-3">

         <div class="card">
            <div class="card-header">
                <div class="card-title">Taches proritaires</div>
                <div class="card-actions">
                    <div class="badge badge-pill bg-blue">{{ $tachesPrioritaires->count() }}</div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($tachesPrioritaires as $tache)
                    @livewire('tabler.task.task-card', ['tache' => $tache], key($tache->id))
                @endforeach
                <div class="mt-3 d-flex justify-content-between">
                    <div>
                        {{ $tachesPrioritaires->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-5 mb-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Liste des taches en cours</div>
                <div class="card-actions">
                    <div class="badge badge-pill bg-blue">{{ $taches->count() }}</div>
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
