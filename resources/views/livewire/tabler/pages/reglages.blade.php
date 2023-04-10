<div>
    @component('components.tabler.header', ['title'=>'Réglages', 'subtitle'=>'Configurations'])

    @endcomponent

    <div class="row">
        <div class="col-md-2">
            @foreach ($tab_list as $btn)
                <div @class(['btn w-100'=>$tab == $btn->tab])>{{ $btn->name }}</div>

            @endforeach
        </div>
        <div class="col-md-10">
            @if ($tab==0)
                @livewire('tabler.config.entreprise')
            @endif
        </div>
    </div>
</div>
