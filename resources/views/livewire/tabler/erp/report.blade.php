<div>
    @component('components.tabler.header', ['title'=>'Rapport', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-section">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Section
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPeople">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Intervenants
        </button>
        <a class="btn btn-primary" target="_blank" href="{{ route('tabler.export_report',['report_id'=>$report->id]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3"></path> </svg>
            PDF
        </a>
    @endcomponent

    <div class="row">
        <div class="col-md-4">
            <div class="card p-2">
                <div class="row">
                    @if ($report_form)
                        <div class="row">
                            @include('_tabler.report.reportForm')
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-secondary" wire:click="$toggle('report_form')">Fermer</button>
                                <button class="btn btn-primary" wire:click="report_update">Modifier</button>
                            </div>
                        </div>
                    @else
                        <div class="col-md" wire:click="selectReport('{{ $report->id }}')" type='button'>
                            <div class="fw-bold">{{ $report->objet }}</div>
                            <div class="text-muted">{{ $report->date->format('d-m-Y') }}</div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-icon" wire:click="report_edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                            </button>
                            <button class="btn btn-danger btn-icon" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">notes</div>
                    <div class="card-actions">

                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Générer des sections</li>
                        <li>générer du contenu de section</li>
                        <li>Ajouter des liens et des images</li>
                        <li>Exporter le rapport</li>
                        <li>type de rapport</li>
                    </ul>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col-md-8">
            @foreach ($sections as $section)
                <div class="mb-2">
                    <div class="card">
                        @if ($section->id == $section_id)
                            <div class="card-body">
                                <form class="row" wire:submit.prevent="update_section">
                                    @include('_tabler.erp.report_section_form')
                                    <div class="d-flex justify-content-between mt-3">
                                        <button class="btn btn-secondary" wire:click="render">Fermer</button>
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        @else
                        <div class="card-header">
                            <div class="card-title">{{ $section->title }}</div>
                            <div class="card-actions">
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalite" wire:click="select_section('{{ $section->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                    Modalités
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFiles" wire:click="select_section('{{ $section->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                    Fichiers
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLink" wire:click="select_section('{{ $section->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                    Lien
                                </button>
                                <button class="btn btn-primary btn-icon" wire:click="edit_section('{{ $section->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                </button> --}}

                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                    </button>
                                    <div class="dropdown-menu  dropdown-menu-demo">
                                         <span class="dropdown-header">Dropdown header</span>
                                            <a class="dropdown-item" wire:click="edit_section('{{ $section->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                Editer
                                            </a>

                                            <hr class="dropdown-divider">

                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addFiles" wire:click="select_section('{{ $section->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                                Images
                                            </a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addLink" wire:click="select_section('{{ $section->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                                Lien
                                            </a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addModalite" wire:click="select_section('{{ $section->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                                Modalités
                                            </a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addInvoice" wire:click="select_section('{{ $section->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                                Devis
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div @class(['col-md-9'=> $section->modalites, 'col-md-12'=> !$section->modalites])>
                                    {!! nl2br($section->description) !!}
                                </div>
                                <div class="col-md-3">
                                    @if ($section->modalites)
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Durée :</div>
                                            <div class="">{{ $section->modalites->duree }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Techniciens :</div>
                                            <div class="">{{ $section->modalites->technicien }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Ouvriers :</div>
                                            <div class="">{{ $section->modalites->ouvrier }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Complexité :</div>
                                            <div class="">{{ $section->modalites->complexite() }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Risque :</div>
                                            <div class="">{{ $section->modalites->risque() }}</div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach ($section->files as $file)
                                            <div class="col-md-3 text-center">
                                                <a href="{{ asset($file->folder) }}" target="_blank">
                                                    <img src="{{ asset($file->folder) }}" alt="{{ $file->name }}" class="avatar avatar-md" />
                                                </a>

                                                <button class="btn btn-danger btn-icon" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        @foreach ($section->links as $link)
                                            <div class="col-md-12">
                                                <div class="card p-2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
                                                         <button class="btn btn-danger btn-icon" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endif
                    </div>
                </div>

            @endforeach

        </div>



    </div>

    @include('_tabler.modal',[
        'id' => "add-section",
        'title' => "Ajouter une section",
        'include' => "_tabler.erp.report_section_form",
        'method' => "add_section"
    ])
    <script> window.addEventListener('close-modal', event => { $("#add-section").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "addModalite",
        'title' => "Définir les modalités",
        'include' => "_tabler.erp.report_modalite_form",
        'method' => "add_modalite"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addModalite").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "addLink",
        'title' => "Ajouter un lien",
        'include' => "_tabler.erp.report_link_form",
        'method' => "add_link"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addLink").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "addFiles",
        'title' => "Ajouter des images",
        'include' => "_tabler.erp.report_file_form",
        'method' => "add_photo"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addFiles").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "addPeople",
        'title' => "Ajouter un intervenant",
        'include' => "_tabler.erp.people_form",
        'method' => "add_people"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addPeople").modal('hide'); }) </script>

    @include('_tabler.modal',[
        'id' => "addInvoice",
        'title' => "Ajouter un devis",
        'include' => "_tabler.erp.invoice_form",
        'method' => "add_invoice"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addInvoice").modal('hide'); }) </script>


</div>

