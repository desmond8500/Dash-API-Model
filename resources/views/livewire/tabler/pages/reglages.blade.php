<div>
    @component('components.tabler.header', ['title'=>'Réglages', 'subtitle'=>'Configurations'])

    @endcomponent


    <div class="btn-list mb-2">
        @foreach ($tablist as $tabitem)
            <button class="btn btn-primary" wire:click="select_tab('{{ $tabitem['id'] }}')">{{ $tabitem['name'] }}</button>
        @endforeach
    </div>

    @switch($tab)
        @case(0)
            @livewire('tabler.components.permissions')

            @break
        @case(1)

            @break
        @default

    @endswitch

</div>
