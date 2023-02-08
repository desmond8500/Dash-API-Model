<div class="row">
    <div class="mb-1">
        @livewire('tabler.erp.building-add', ['projet_id' => $projet_id])
    </div>

    @foreach ($buildings as $building)
        <div class="col-md-6" >
            <div class="card p-2 mb-1">
                <div class="row">
                    <div class="col-auto" type="button" wire:click="gotoBuilding('{{ $building->id }}')">
                        <img src="" class="avatar avatar-md" alt="A">
                    </div>
                    <div class="col"  wire:click="gotoBuilding('{{ $building->id }}')">
                        {{ $building->name }}
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-icon btn-outline-primary" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
