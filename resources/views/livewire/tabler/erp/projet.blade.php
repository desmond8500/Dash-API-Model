<div>
    @component('components.tabler.header', ['title'=>'Projet', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        <button class="btn btn-primary " wire:click="$toggle('show_menu')">
            @if ($show_menu)
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path> <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"></path> <path d="M3 3l18 18"></path> </svg>
                <span class="d-none d-sm-block">Cacher le menu</span>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> </svg>
                <span class="d-none d-sm-block">Afficher le menu</span>
            @endif
        </button>
    @endcomponent

    <div class="row g-2">
        @if ($show_menu)
            <div class="col-md-3 mb-3">
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
                <div class="btn mt-1 @if($tab==8) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(8)">
                    <div>Planning</div> <div></div>
                </div>
                <div class="btn mt-1 @if($tab==9) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(9)">
                    <div>Etat d'avancement</div> <div></div>
                </div>
                <div class="btn mt-1 @if($tab==10) btn-primary @else btn-dark @endif d-flex justify-content-between"  wire:click="selectTab(10)">
                    <div>Fiches</div> <div></div>
                </div>
            </div>
        @endif
        <div @class(['col-md-9 mb-3'=> $show_menu, 'col-md-12 mb-3'=> !$show_menu])>
            <div class="row">
                @switch($tab)
                    @case(1)
                        @livewire('tabler.erp.devis-list-card', ['projet_id' => $projet->id])
                        @break
                    @case(2)
                        @livewire('tabler.erp.rapport-list-card', ['projet_id'=> $projet->id])
                        @break
                    @case(3)
                        @livewire('tabler.task.task-projet-list', ['projet_id'=> $projet->id])
                        @break
                    @case(4)
                        @livewire('tabler.erp.contact-list', ['projet_id'=> $projet->id])
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
                    @case(8)
                        @livewire('tabler.erp.plannings',['projet_id'=> $projet->id])
                        @break
                    @case(9)
                        @livewire('tabler.erp.avancements',['projet_id'=> $projet->id])
                        @break
                    @case(10)
                        @livewire('tabler.erp.fiches',['projet_id'=> $projet->id])
                        @break
                    @default

                @endswitch
            </div>
        </div>
    </div>
</div>
