<div>
    @component('components.tabler.header', ['title'=>'Building', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        @livewire('tabler.erp.level-add', ['building_id' => $building->id])
        @livewire('tabler.erp.stage-generate', ['building_id' => $building->id])
    @endcomponent

    <div class="row">
        @foreach ($building->stages as $stage)
        <div class="col-md-4 g-2">
            @livewire('tabler.erp.building-card', ['stage_id' => $stage->id], key($stage->id))
        </div>
        @endforeach

    </div>
</div>

