<div class="row">

    <div class="col-md-12">
        {{-- <div class="card mb-2">
            <div class="card-header">
                <div class="card-title">Rapports</div>
                <div class="card-actions">

                </div>
            </div>
        </div> --}}

        <div class="row g-2">
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model.defer="search" placeholder="Rechercher" wire:keydown.enter='getReports'>
                    <button class="btn btn-primary btn-icon" wire:click="getReports">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path> <path d="M21 21l-6 -6"></path> </svg>
                    </button>
                    @if ($search)
                        <button class="btn btn-secondary btn-icon" wire:click="resetSearch">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                        </button>
                    @endif
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReport">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                    Rapport
                </button>
            </div>
            <div class="w-100"></div>
            @foreach ($reports as $report)
                <a style="text-decoration: none" class="col-md-6" href="{{ route('tabler.report',['report_id'=>$report->id]) }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="h4 m-0 fw-bold">{{ $report->objet }}</div>
                                <div class="">{{ date_format($report->date, 'd-m-Y') }}</div>
                            </div>
                            <div>
                                <div class="text-muted">{!! nl2br($report->description) !!}</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" defer></script>
</div>



