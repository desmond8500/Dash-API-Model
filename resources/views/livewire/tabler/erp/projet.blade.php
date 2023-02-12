<div>
    @component('components.tabler.header', ['title'=>'Projet', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-3">
            <div class="card p-2">
                <h3 class="fw-bold">{{ $projet->name }}</h3>
                <div class="text-muted">
                    {!! nl2br($projet->description) !!}
                </div>
            </div>
            <div class="btn mt-1 @if($tab==1) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(1)">
                <div>Devis</div> <div></div>
            </div>
            <div class="btn mt-1 @if($tab==2) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(2)">
                <div>Rapports</div> <div></div>
            </div>
            <div class="btn mt-1 @if($tab==3) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(3)">
                <div>Taches</div> <div></div>
            </div>
            <div class="btn mt-1 @if($tab==4) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(4)">
                <div>Contacts</div> <div></div>
            </div>
            <div class="btn mt-1 @if($tab==5) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(5)">
                <div>Finances</div> <div></div>
            </div>
            <div class="btn mt-1 @if($tab==6) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(6)">
                <div>Dossier Technique</div> <div></div>
            </div>
            <div class="btn mt-1 @if($tab==7) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(7)">
                <div>Batiments</div> <div></div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @switch($tab)
                    @case(1)
                        @livewire('tabler.erp.devis-list-card', ['projet_id' => $projet->id])
                        @break
                    @case(2)
                        @livewire('tabler.erp.reports', ['projet_id'=> $projet->id])
                        @break
                    @case(3)
                        @livewire('tabler.task.task-projet-list', ['taches'=> $taches, 'projet_id'=> $projet->id])
                        @break
                    @case(4)
                        Contacts
                        @break
                    @case(5)
                        Finances
                        @break
                    @case(6)
                        @livewire('tabler.erp.dossier-technique',['projet_id'=> $projet->id])
                        @break
                    @case(7)
                        @livewire('tabler.erp.batiment-list-card',['projet_id'=> $projet->id])
                        @break

                    @default

                @endswitch
            </div>
        </div>
    </div>
</div>
