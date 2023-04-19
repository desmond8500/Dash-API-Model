<div class="col-md-7 mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" wire:model.defer="name"/>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="mb-3 col-md-5">
    <label class="form-label">Systèmes</label>
    <select class="form-select"wire:model.defer="system_id">
        <option value="0">Sélectionnez un système</option>
        @foreach ($systems as $system)
            <option value="{{ $system->id }}">{{ $system->name }}</option>
        @endforeach
    </select>
    @error('system_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-12 mb-3">
    <label class="form-label">Commentaire</label>
    <textarea class="form-control" wire:model.defer="comment"></textarea>
    @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
</div>

