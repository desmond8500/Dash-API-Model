<div class="row">

    <div class="col-md-7">
        @if ($report)
            @if ($editform)
                <div class="card card-body">
                    <div class="row">
                        @include('_tabler.report.reportForm')
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-secondary" wire:click="$toggle('editform')">Fermer</button>
                            <button class="btn btn-primary" wire:click="report_update">Modifier</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Rapport</div>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-icon" wire:click="report_edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fw-bold">{{ $report->objet }}</div>
                        <div class="text-muted">{!! nl2br($report->description) !!}</div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFile">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                            Fichier
                        </button>
                    </div>
                </div>
            @endif
        @endif
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Rapports</div>
                <div class="card-actions">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReport">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                        Rapport
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($report_form)
                    <div class="row">
                        @include('_tabler.report.reportForm')
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-secondary" wire:click="$toggle('report_form')">Fermer</button>
                            <button class="btn btn-primary" wire:click="report_add">Ajouter</button>
                        </div>
                    </div>
                @else
                    @foreach ($reports as $report)
                        <div class="border-bottom pb-1 mt-2 row">
                            <div class="col-md" wire:click="selectReport('{{ $report->id }}')" type='button'>
                                <div class="fw-bold">{{ $report->objet }}</div>
                                <div class="text-muted">{{ $report->date->format('d-m-Y') }}</div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-danger btn-icon" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

        <div class="modal modal-blur fade" id="addFile" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un fichier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form wire:submit.prevent="addFile" class="row">
                                <div class="col-auto">
                                    <div wire:loading>
                                        Chargement <div class="spinner-border" role="status"></div>
                                    </div>

                                    <label href="#" class="avatar avatar-upload rounded" for="file">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                                        <span class="avatar-upload-text">Ajouter</span>
                                        <input type="file" style="display: none" id="file" multiple wire:model.defer="files">
                                    </label>
                                </div>


                                <div class="col-md-12">
                                    <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal modal-blur fade" id="addReport" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form wire:submit.prevent='report_add'>
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un rapport</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @include('_tabler.report.reportForm')
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" >Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script> window.addEventListener('close-modal', event => { $("#addReport").modal('hide'); }) </script>
</div>


