<div>
    @component('components.tabler.header', ['title'=>'Building', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        @livewire('tabler.erp.level-add', ['building_id' => $building->id])
        @livewire('tabler.erp.stage-generate', ['building_id' => $building->id])
    @endcomponent

    <div class="row">
        @foreach ($building->stages as $stage)
        <div class="col-md-4 g-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-auto">
                        <img src="" alt="A" class="avatar avatar-md">
                    </div>
                    <div class="col">
                        <div class="card-title">{{ $stage->name }}</div>
                        <div class="text-muted text-truncate">{{ nl2br($stage->description) }}</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-primary btn-icon" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

