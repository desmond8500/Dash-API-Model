<div>
    <a class="btn btn-primary mb-2" target="_blank" href="{{ route('tabler.export_avancements', ['projet_id'=> $projet_id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3"></path> </svg>
        Exporter PDF
    </a>
    <div class="row">
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
                            <tr class="bg-primary text-light">
                                <th colspan="6" class="text-center" style="vertical-align: center; text-transform: uppercase;">{{ $building->name }}</th>
                                <td class="text-end">
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCategorie" wire:click="$set('category_building_id','{{ $building->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                        Catégorie
                                    </button>
                                </td>
                            </tr>
                            <tr class="table-secondary ">
                                <th scope="col">Description</th>
                                <th class="text-center">Durée</th>
                                <th class="text-center">Début</th>
                                <th class="text-center">Fin</th>
                                <th class="text-center">% Complete</th>
                                <th class="text-center">Commentaires / Taches conditionelles</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            <tbody>
                                @foreach ($building->categories as $category)
                                    <tr class=" table-primary">
                                        @if ($category->id == $category_id)
                                            <td colspan="7">
                                                <form class="row" wire:submit.prevent="update_category">
                                                    @include('_tabler.erp.avancement_category_form')
                                                    <div class="col-md-12 d-flex justify-content-between">
                                                        <a class="btn btn-secondary" wire:click="$set('category_id',0)">Fermer</a>
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                    </div>
                                                </form>
                                            </td>
                                        @else
                                            <td colspan="5" class="fw-bold text-primary user-select-all" style="font-size: 20px">{{ $category->name }}</td>
                                            <td colspan="2" class="text-end">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAvancement" wire:click="setAvancement('{{ $building->id }}','{{ $category->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                                Système
                                            </button>
                                            <button class="btn btn-primary btn-icon" wire:click="edit_category('{{ $category->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                            </button>
                                            </td>
                                        @endif
                                    </tr>

                                    @foreach ($category->avancements as $avancement)
                                        <tr class="table-warning">
                                            @if ($avancement_id == $avancement->id)
                                                <td colspan="7">
                                                    <form wire:submit.prevent="update_avancement" class="row">
                                                        @include('_tabler.erp.avancement_form')
                                                        <div class="col-md-12 d-flex justify-content-between">
                                                            <a class="btn btn-danger" wire:click='delete_avancement'>Supprimer</a>
                                                            <button class="btn btn-primary" type="submit" >Modifier</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            @else
                                                <th colspan="5" style="text-transform: uppercase" class="user-select-all">{{ $avancement->name }}</th>
                                                <td colspan="2" class="text-end">
                                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addSection" wire:click="$set('system','{{ $avancement->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                                        Section
                                                    </button>
                                                    <button class="btn btn-warning btn-icon" wire:click="edit_avancement('{{ $avancement->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                        @foreach ($avancement->sections as $section)
                                            {{-- <tr>
                                                <td colspan="7">
                                                    @dump($section)
                                                </td>
                                            </tr> --}}
                                            <tr class="fw-bold">
                                                @if ($section_id == $section->id)
                                                    <td colspan="6">
                                                        <form wire:submit.prevent="update_section" class="row">
                                                            @include('_tabler.erp.avancement_section_form')
                                                            <div class="col-md-12 d-flex justify-content-between">
                                                                <button class="btn btn-primary" type="submit" >Modifier</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" wire:click="delete_section">Supprimer</button>

                                                    </td>
                                                @else
                                                    <td class="user-select-all">{{ $section->name }}</td>
                                                    <td class="text-center">
                                                        @if ($section->rows->count())

                                                            {{ $section->duration() }}
                                                            {{-- {{ $section->duration() + 1 }} --}}
                                                            @if ($section->duration() >= 0 && $section->duration() < 2)
                                                                Day
                                                            @else
                                                                Days
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($section->rows->count())
                                                            {{ date_format($section->start(), 'd-m-Y') }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($section->rows->count())
                                                            {{ date_format($section->end(), 'd-m-Y') }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($section->rows->count())
                                                        @php
                                                            $somme = number_format($section->rows->sum('progress') / $section->rows->count(), 0, ',', ' ');
                                                        @endphp
                                                            {{ $somme }} %
                                                        @endif
                                                    </td>
                                                    <td>{{ $section->comment }}</td>
                                                    <td class="text-end">
                                                        <button class="btn btn-secondary btn-icon" wire:click="edit_section('{{ $section->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                        </button>
                                                        <button class="btn btn-secondary btn-icon" data-bs-toggle="modal" data-bs-target="#addRow" wire:click="$set('avancement_row_id','{{ $section->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 5l0 14"></path> <path d="M5 12l14 0"></path> </svg>
                                                        </button>
                                                        <a class="btn btn-icon btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#generateRow" wire:click="$set('avancement_row_id','{{ $section->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 5l0 14"></path> <path d="M5 12l14 0"></path> </svg>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                            @foreach ($section->rows as $row)
                                                <tr class="">
                                                    @if ($row_id == $row->id)
                                                        <td colspan="6">
                                                            <form wire:submit.prevent='update_row' class="row">
                                                                @include("_tabler.erp.avancement_row_form")
                                                                <div class="col-md-12 text-end">
                                                                    <button class="btn btn-primary" >Modfier</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td style="width: 10px">
                                                            <button class="btn btn-icon btn-secondary" wire:click="$set('row_id',0)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                                                            </button>
                                                            <button class="btn btn-icon btn-danger" wire:click="delete_row">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                                            </button>

                                                            <button @class(['btn btn-primary mt-2'=>$prevision, 'btn btn-secondary mt-2'=>!$prevision]) wire:click="$toggle('prevision')">
                                                                @if ($prevision)
                                                                    A programmer 1
                                                                @else
                                                                    Prévision 0
                                                                @endif
                                                            </button>

                                                        </td>
                                                    @else
                                                        <td class="user-select-all">{{ $row->name }}</td>
                                                        <td>
                                                            {{ $row->duration() }}
                                                            @if ($row->duration() > 0 && $row->duration() < 2 )
                                                                Day
                                                            @else
                                                                Days
                                                            @endif
                                                        </td>
                                                        <td @class(['text-center'=>!$row->prevision, 'text-center text-danger'=>$row->prevision])>{{ date_format($row->start, 'd-m-Y') }}</td>
                                                        <td @class(['text-center'=>!$row->prevision, 'text-center text-danger'=>$row->prevision])>{{ date_format($row->end, 'd-m-Y') }}</td>
                                                        <td class="text-center">{{ $row->progress }} %</td>
                                                        <td>{{ $row->comment }}</td>
                                                        <td class="text-end">
                                                            <a class="btn btn-icon btn-outline-secondary" wire:click="edit_row('{{ $row->id }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                            </a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
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

    @include('_tabler.modal',[
        'id' => "addCategorie",
        'title' => "Ajouter une categorie",
        'include' => "_tabler.erp.avancement_category_form",
        'method' => "add_category"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addCategorie").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "generateRow",
        'title' => "Générer une ligne",
        'include' => "_tabler.erp.generate_row_form",
        'method' => "generate_rows"
    ])
    <script> window.addEventListener('close-modal', event => { $("#generateRow").modal('hide'); }) </script>
</div>
