<div>
    <div>
        @component('components.tabler.header', ['title'=>'Clients', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
            @livewire('tabler.erp.client-add')
        @endcomponent
    </div>

    <div class="row">
        @foreach ($clients as $key => $client)
        <div class="col-md-3 mb-2">
            {{-- @livewire('tabler.erp.client-card', ['client' => $client], key($key)) --}}
            @component('components.tabler.erp.client-card', ['client', $client])

            @endcomponent
        </div>
        @endforeach
    </div>

</div>
