<div class="row">
    @component('components.tabler.header', ['title'=> 'Dashboard', 'subtitle'=> 'Subtitle'])

    @endcomponent

    <div class="col-md-8">

    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Liste des taches en cours</div>
                <div class="card-actions">

                </div>
            </div>
            <div class="card-body">
                @foreach ($taches as $tache)
                    @livewire('tabler.task.task-card', ['tache' => $tache], key($tache->id))
                @endforeach
            </div>
        </div>

    </div>


    {{-- <div class="card mb-2">
        <div class="card-header">
            <div class="card-title fw-bold">Utilisateurs</div>
            <div class="card-actions">
                <div class="badge">{{ $users->count() }}</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($users as $user)
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="row">
                            <div class="col-auto">
                                <img src="" alt="A" class="avatar avatar-md">
                            </div>
                            <div class="col">
                                <div>{{ $user->name }} </div>
                                <div>{{ $user->email }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header">
            <div class="card-title fw-bold">Images</div>
        </div>
        <div class="card-body row">
            <a class="col-md-2" data-fslightbox
                href="https://images.unsplash.com/photo-1663875928932-3bf9dba77e26?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
                <img
                    src="https://images.unsplash.com/photo-1663875928932-3bf9dba77e26?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
            </a>
            <a class="col-md-2" data-fslightbox
                href="https://images.unsplash.com/photo-1663875967691-15b02702931c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
                <img
                    src="https://images.unsplash.com/photo-1663875967691-15b02702931c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
            </a>
            <a class="col-md-2" data-fslightbox
                href="https://images.unsplash.com/photo-1663940019982-c14294717dbd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
                <img
                    src="https://images.unsplash.com/photo-1663940019982-c14294717dbd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
            </a>
        </div>
    </div>

    <div class="mb-2">
        <div class="input-group mb-2">
            <input type="text" class="form-control" wire:model="lien">
            <button class="btn" wire:click="scrapper()">Lien</button>
        </div>

        @if ($test->url)
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">
                    {{ $test->title }}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <img src="{{ $test->image }}" alt="" class="avatar avatar-xl">
                    </div>
                    <div class="col">
                        <div>{{ $test->marque }}</div>
                        <div>{{ $test->reference }}</div>
                        <div> {!! $test->description !!} </div>
                        <div>{{ $test->price }} {{ $test->devise }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div> --}}
</div>
