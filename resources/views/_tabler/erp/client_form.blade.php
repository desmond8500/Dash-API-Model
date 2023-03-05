<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label required fw-bold">Nom du client</label>
        <input type="text" wire:model="name" class="form-control">
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label required fw-bold">Description du client</label>
        <textarea class="form-control" wire:model="description" cols="30" rows="3"></textarea>
        @error('description') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-12 d-flex justify-content-between">
        <button class="btn btn-danger" wire:click="delete_Client('{{ $client->id }}')" data-bs-dismiss="modal">Supprimer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
    <div class="col-md-12">
        <div class="text-danger">{{ $message }}</div>
    </div>
</div>
