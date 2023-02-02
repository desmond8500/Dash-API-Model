<div>
    <div>
        @component('components.tabler.header', ['title'=>'Projet', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])

        @endcomponent
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card p-2">
                <h3 class="fw-bold">{{ $projet->name }}</h3>
                <div class="text-muted">
                    {!! nl2br($projet->description) !!}
                </div>
            </div>
            <div class="btn btn-dark mt-1  d-flex justify-content-between" wire:click="selectTab(1)">
                <div>Devis</div> <div></div>
            </div>
            <div class="btn btn-dark mt-1  d-flex justify-content-between" wire:click="selectTab(2)">
                <div>Rapports</div> <div></div>
            </div>
            <div class="btn btn-dark mt-1  d-flex justify-content-between" wire:click="selectTab(3)">
                <div>Taches</div> <div></div>
            </div>
            <div class="btn btn-dark mt-1  d-flex justify-content-between" wire:click="selectTab(4)">
                <div>Contacts</div> <div></div>
            </div>
            <div class="btn btn-dark mt-1  d-flex justify-content-between" wire:click="selectTab(5)">
                <div>Finances</div> <div></div>
            </div>
            <div class="btn btn-dark mt-1  d-flex justify-content-between" wire:click="selectTab(6)">
                <div>Dossier Technique</div> <div></div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @switch($tab)
                    @case(1)
                        @livewire('tabler.erp.devis-list-card', ['devis' => $devis])
                        @break
                    @case(2)
                        @livewire('tabler.erp.reports', ['projet_id'=> $projet->id])
                        @break
                    @case(3)
                        Taches
                        @break
                    @case(3)
                        Contacts
                        @break
                    @case(4)
                        Finances
                        @break
                    @case(5)
                        Batiments
                        @break

                    @default

                @endswitch
            </div>
        </div>
    </div>

</div>
