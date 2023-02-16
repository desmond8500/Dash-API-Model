<div class="row">
    @component('components.tabler.header', ['title'=> 'Dashboard', 'subtitle'=> 'Subtitle'])

    @endcomponent

    {{-- <div class="col-md-7 mb-3">
        <div id="lightgallery">
        <a href="https://avatarfiles.alphacoders.com/844/thumb-84463.jpg" data-lg-size="1600-2400">
            <img alt="img1" src="https://avatarfiles.alphacoders.com/844/thumb-84463.jpg" />
        </a>
        <a href="https://avatarfiles.alphacoders.com/110/thumb-110201.png" data-lg-size="1024-800">
            <img alt="img2" src="https://avatarfiles.alphacoders.com/110/thumb-110201.png" />
        </a>
        ...
    </div> --}}
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
</div>
