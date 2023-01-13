<div>

    @component('components.tabler.header', ['title'=>'Devis', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

    @endcomponent

    <div class="row">
        <div class="col-md-9">
            <table class="table table-responsive bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-nowrap">Désignation</th>
                        <th class="text-nowrap">Quantité</th>
                        <th class="text-nowrap">Coef</th>
                        <th class="text-nowrap">Prix</th>
                        <th class="text-nowrap">Total</th>
                        <th class="text-nowrap">Marge</th>
                        <th class="text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devis as $item)

                    @endforeach
                    <tr>
                        <th>1</th>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="card mb-2">
                <div class="card-header">
                    <div class="card-title">Acomptes</div>
                    <div class="card-actions">
                        <button class="btn btn-primary" disabled>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                          Ajouter
                        </button>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">
                    <div class="card-title">Dépenses</div>
                    <div class="card-actions">
                        <button class="btn btn-primary" disabled>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                          Ajouter
                        </button>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">
                    <div class="card-title">Modalités</div>
                    <div class="card-actions">
                        <button class="btn btn-outline-secondary btn-icon disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">
                    <div class="card-title">Notes</div>
                    <div class="card-actions">
                        <button class="btn btn-outline-secondary btn-icon disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>


        </div>
    </div>
</div>
