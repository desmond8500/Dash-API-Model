<div>
    @component('components.tabler.header', ['title'=> 'Importer', 'subtitle'=> 'Stock'])

    @endcomponent

    <div class="mb-2">
        <div class="input-group mb-2">
            <input type="text" class="form-control" wire:model="lien">
            <button class="btn" wire:click="scrapper()">Lien</button>
        </div>

        @if ($test)
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
    </div>
    @dump($fre)
</div>
