<div>
    @component('components.tabler.header', ['title'=>'Réglages', 'subtitle'=>'Configurations'])

    @endcomponent

    <div class="row">
        <div class="col-md-2">
            @foreach ($tab_list as $btn)
                <div wire:click="set_tab('{{ $btn['tab'] }}')" @class(['btn mb-1 w-100'=> $tab != $btn['tab'], 'btn mb-1 btn-primary w-100'=> $tab == $btn['tab']])>{{ $btn['name'] }}</div>
            @endforeach
        </div>
        <div class="col-md-10">
            @if ($tab==0)
                @livewire('tabler.config.entreprise')
            @elseif($tab==1)
                @livewire('tabler.config.users')
            @elseif($tab==2)
                @livewire('tabler.config.permissions')
            @endif
        </div>
    </div>
</div>
