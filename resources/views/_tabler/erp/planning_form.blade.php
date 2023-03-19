 <div class="form-floating mb-3 col-md-8">
    <input type="text" class="form-control" wire:model.defer="tache">
    <label for="floatingInput">Tache</label>
    @error('tache') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating mb-3 col-md-4">
    <input type="date" class="form-control" wire:model.defer="date">
    <label for="floatingInput">Date</label>
    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating  mb-3 col-md-6">
    <select class="form-select" wire:model.defer='batiment_id'>
        @foreach ($batiments as $batiment)
            <option value="{{ $batiment->id }}">{{ $batiment->name }}</option>
        @endforeach
    </select>
    <label for="floatingSelect">Batiments</label>
    @error('tache') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating  mb-3 col-md-6">
    <select class="form-select" wire:model.defer='system_id'>
        @foreach ($systems as $system)
            <option value="{{ $system->id }}">{{ $system->name }}</option>
        @endforeach
    </select>
    <label for="floatingSelect">Systèmes</label>
    @error('tache') <span class="text-danger">{{ $message }}</span> @enderror
</div>
