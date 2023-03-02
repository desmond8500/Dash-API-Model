<div>
    <div>
        @component('components.tabler.header', ['title'=>'Projets', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
            @livewire('tabler.erp.projet-add', ['client_id' => $client_id])
        @endcomponent
    </div>

    <div class="row">
        <div class="col-md-4 g-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-auto">
                        <img src="{{ asset($client->logo) }}" alt="A" class="avatar avatar-md">
                    </div>
                    <div class="col">
                        <h3 class="fw-bold">{{ $client->name }}</h3>
                        <div class="text-muted">
                            {!! nl2br($client->description) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach ($projets as $projet)
                    <div class="col-md-4 g-2">
                        @livewire('tabler.erp.projet-card', ['projet' => $projet], key($projet->id))
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
