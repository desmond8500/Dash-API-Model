<div>
    <div class="card p-2">
        <div class="row">
            <div class="col-auto" wire:click="gotoProjets('{{ $client->id }}')" type='button'>
                <img src="" alt="A" class="avatar">
            </div>
            <div class="col" wire:click="gotoProjets('{{ $client->id }}')" type='button'>
                <div class="fw-bold">{{ $client->name }}</div>
                <div class="text-muted">{!! nl2br($client->description) !!} </div>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-secondary btn-icon disabled" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $client->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editer un client</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ... {{ $client->name }}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary">Modifier</button>
          </div>
        </div>
      </div>
    </div>

</div>
