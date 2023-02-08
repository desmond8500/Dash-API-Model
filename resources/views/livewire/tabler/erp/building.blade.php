<div>
    @component('components.tabler.header', ['title'=>'Building', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        @livewire('tabler.erp.level-add', ['building_id' => $building->id])
    @endcomponent


</div>
