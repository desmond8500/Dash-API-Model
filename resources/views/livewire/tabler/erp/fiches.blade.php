<div class="row g-2">
    <div class="col">

    </div>
    <div class="col-auto">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFiche">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
          Fiche
        </button>
    </div>
    <div class="w-100"></div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                @foreach ($fiches as $fiche)
                    <div class="card p-2 mb-1" type="button" wire:click="select_fiche('{{ $fiche->id }}')">
                        {{ $fiche->name }}
                    </div>
                @endforeach
            </div>
            <div class="col-md-9">
                @if ($selected_fiche)
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ $selected_fiche->name }}</div>
                            <div class="card-actions">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addZone" wire:click="$set('fiche_id','{{ $selected_fiche->id }}')" title="Ajouter une zone">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                    Zone
                                </button>
                                <button class="btn btn-primary btn-icon" wire:click="edit_fiche" title="Editer une fiche">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                </button>
                                <a class="btn btn-primary btn-icon" title="Exporter en PDF" href="{{ route('tabler.export_pdf_galaxy',['fiche_id'=>$selected_fiche->id]) }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3"></path> </svg>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div></div>
                                <div>
                                    @if ($selected_fiche->date)
                                        {{ date_format($selected_fiche->date, 'Y-m-d') }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;" class="text-center">#</th>
                                        <th style="width: 50px;">Zone</th>
                                        <th scope="col">Local</th>
                                        {{-- <th scope="col">Local</th> --}}
                                        <th style="width: 100px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selected_fiche->zones as $key => $row)
                                        <tr class="">
                                            <td class="text-center fw-bold">{{ $key+1 }}</td>
                                            <td>{{ $row->zone }}</td>
                                            <td>
                                                <div class="text-muted">{{ $row->equipement }}</div>
                                                <div>{{ $row->local }}</div>
                                            </td>
                                            <td>
                                                <div class="btn btn-icon btn-primary" wire:click="edit_fiche_zone('{{ $row->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                                </div>
                                                <div class="btn btn-icon btn-danger" wire:click="delete_fiche_zone('{{ $row->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                        <div class="card-footer">

                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>



    @include('_tabler.modal',[
        'id' => "addFiche",
        'title' => "Ajouter une fiche",
        'include' => "_tabler.erp.fiche_form",
        'method' => "add_fiche"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addFiche").modal('hide'); }) </script>
    @include('_tabler.modal',[
        'id' => "editFiche",
        'title' => "Modifer une fiche",
        'include' => "_tabler.erp.fiche_form",
        'method' => "update_fiche",
        'submit' => 'Modifier',
    ])
    <script> window.addEventListener('open-edit-fiche', event => { $("#editFiche").modal('show'); }) </script>
    <script> window.addEventListener('close-modal', event => { $("#editFiche").modal('hide'); }) </script>
    @include('_tabler.modal',[
        'id' => "addZone",
        'title' => "Ajouter une zone",
        'include' => "_tabler.erp.fiche_zone_form",
        'method' => "add_fiche_zone"
    ])
    <script> window.addEventListener('close-modal', event => { $("#addZone").modal('hide'); }) </script>
    @include('_tabler.modal',[
        'id' => "editZone",
        'title' => "Modifier une zone",
        'include' => "_tabler.erp.fiche_zone_form",
        'method' => "update_fiche_zone",
        'submit' => 'Modifier',
    ])
    <script> window.addEventListener('open-edit-zone', event => { $("#editZone").modal('show'); }) </script>
    <script> window.addEventListener('close-modal', event => { $("#editZone").modal('hide'); }) </script>

</div>
