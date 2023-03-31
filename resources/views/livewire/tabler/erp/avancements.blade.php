<div>
    <div class="row">
        <div class="col-md-12 mb-2">
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAvancement">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                Avancement
            </button>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Etat d'avancement</div>
                    <div class="card-actions">

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        @foreach ($buildings as $building)
                            {{-- <thead> --}}
                                <tr class="bg-primary text-light">
                                    <th colspan="7" class="text-center">{{ $building->name }}</th>
                                </tr>
                                <tr class="table-secondary ">
                                    <th scope="col">Description</th>
                                    <th scope="col">Durée</th>
                                    <th scope="col">Début</th>
                                    <th scope="col">Fin</th>
                                    <th scope="col">% Complete</th>
                                    <th scope="col">Commentaires</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            {{-- </thead> --}}
                            <tbody>
                                @foreach ($building->systems as $sys_item)
                                    <tr class="table-warning">
                                        @if ($avancement_id == $sys_item->id)
                                            <td colspan="7">
                                                <form wire:submit.prevent="update_avancement" class="row">
                                                    @include('_tabler.erp.avancement_form')
                                                    <div class="col-md-12 d-flex justify-content-between">
                                                        <button class="btn btn-primary" type="submit" >Modifier</button>
                                                    </div>
                                                </form>
                                            </td>
                                        @else
                                            <th colspan="6" class="">{{ strtoupper($sys_item->name) }}</th>
                                            <td class="text-end">
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSection" wire:click="$set('system','{{ $sys_item->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                                    Section
                                                </button>
                                                <button class="btn btn-primary btn-icon" wire:click="edit_avancement('{{ $sys_item->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                    @foreach ($sys_item->sections as $section)
                                        <tr class="fw-bold">
                                            @if ($section_id == $section->id)
                                                <td colspan="7">
                                                    <form wire:submit.prevent="update_section" class="row">
                                                        @include('_tabler.erp.avancement_section_form')
                                                        <div class="col-md-12 d-flex justify-content-between">
                                                            <button class="btn btn-primary" type="submit" >Modifier</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            @else
                                                <td>{{ $section->name }}</td>
                                                <td>Durée</td>
                                                <td>Date debut</td>
                                                <td>Date fin</td>
                                                <td> xxx% </td>
                                                <td>{{ $section->comment }}</td>
                                                <td class="text-end">
                                                    <button class="btn btn-primary btn-icon" wire:click="edit_section('{{ $section->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                    </button>
                                                    <button class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#addRow" wire:click="$set('section_id','{{ $section->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 5l0 14"></path> <path d="M5 12l14 0"></path> </svg>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                        @foreach ($section->rows as $row)
                                            <tr class="">
                                                @if ($row_id == $row->id)
                                                    <td colspan="7">
                                                        <form wire:submit.prevent='update_row' class="row">
                                                            @include("_tabler.erp.row")
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>{{ $row->name }}</td>
                                                    <td>-</td>
                                                    <td>{{ date_format($row->start, 'd-m-Y') }}</td>
                                                    <td>{{ date_format($row->end, 'd-m-Y') }}</td>
                                                    <td>{{ $row->progress }} %</td>
                                                    <td>{{ $row->comment }}</td>
                                                    <td class="text-end">
                                                        <a class="btn btn-icon btn-primary" wire:click="edit_row('{{ $row->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    <div>

    @include('_tabler.modal',[
        'id' => "addAvancement",
        'title' => "Ajouter un avancement",
        'include' => "_tabler.erp.avancement_form",
        'method' => "add_avancement"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addAvancement").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "addSection",
        'title' => "Ajouter une section",
        'include' => "_tabler.erp.avancement_section_form",
        'method' => "add_section"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addSection").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "addRow",
        'title' => "Ajouter une ligne",
        'include' => "_tabler.erp.avancement_row_form",
        'method' => "add_row"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addRow").modal('hide'); }) </script>




</div>
