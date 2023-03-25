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
                                        <button class="btn btn-secondary" wire:click="$set('section_id',0)">Fermer</button>
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        @else
                        <div class="card-header">
                            <div class="card-title">{{ $section->title }}</div>
                            <div class="card-actions">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalite">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                    Modalités
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFiles">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                    Fichiers
                                </button>
                                <button class="btn btn-primary btn-icon" wire:click="edit_section('{{ $section->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! nl2br($section->description) !!}
                        </div>
                        <div class="card-footer">

                        </div>
                       @endif
                    </div>
                </div>

            @endforeach

        </div>



    </div>



    <div class="modal modal-blur fade" id="add-section" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent='add_section'>
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter une section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @include('_tabler.erp.report_section_form')
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script> window.addEventListener('close-modal', event => { $("#add-section").modal('hide'); }) </script>



    <div class="modal modal-blur fade" id="addModalite" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent=''>
                    <div class="modal-header">
                        <h5 class="modal-title">Add a new team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3 align-items-end">
                            <div class="col-auto">
                                <a href="#" class="avatar avatar-upload rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                                    <span class="avatar-upload-text">Ajouter</span>
                                </a>
                            </div>
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model.defer="name"/>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Appartement</label>
                            <select class="form-select"wire:model.defer="select">
                                <option value="0">Sélectionnez un Appartement</option>

                            </select>
                            @error('select') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" wire:model.defer="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script> window.addEventListener('close-modal', event => { $("#addModalite").modal('hide'); }) </script>



    <div class="modal modal-blur fade" id="addPeople" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent=''>
                    <div class="modal-header">
                        <h5 class="modal-title">Add a new team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3 align-items-end">
                            <div class="col-auto">
                                <a href="#" class="avatar avatar-upload rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                                    <span class="avatar-upload-text">Ajouter</span>
                                </a>
                            </div>
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model.defer="name"/>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Appartement</label>
                            <select class="form-select"wire:model.defer="select">
                                <option value="0">Sélectionnez un Appartement</option>

                            </select>
                            @error('select') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" wire:model.defer="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script> window.addEventListener('close-modal', event => { $("#addPeople").modal('hide'); }) </script>



    <div class="modal modal-blur fade" id="addFiles" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent=''>
                    <div class="modal-header">
                        <h5 class="modal-title">Add a new team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3 align-items-end">
                            <div class="col-auto">
                                <a href="#" class="avatar avatar-upload rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                                    <span class="avatar-upload-text">Ajouter</span>
                                </a>
                            </div>
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model.defer="name"/>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Appartement</label>
                            <select class="form-select"wire:model.defer="select">
                                <option value="0">Sélectionnez un Appartement</option>

                            </select>
                            @error('select') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" wire:model.defer="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script> window.addEventListener('close-modal', event => { $("#addFiles").modal('hide'); }) </script>
</div>
