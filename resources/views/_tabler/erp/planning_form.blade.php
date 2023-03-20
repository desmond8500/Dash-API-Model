 <div class="form-floating mb-3 col-md-12">
    <input type="text" class="form-control" wire:model.defer="tache">
    <label for="floatingInput">Tache</label>
    @error('tache') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating mb-3 col-md-6">
    <input type="date" class="form-control" wire:model.defer="debut">
    <label for="floatingInput">Debut</label>
    @error('debut') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating mb-3 col-md-6">
    <input type="date" class="form-control" wire:model.defer="fin">
    <label for="floatingInput">Fin</label>
    @error('fin') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating  mb-3 col-md-6">
    <select class="form-select" wire:model.defer="batiment_id">
        <option value="null" disabled>{{ __('Sélectionner') }}</option>
        @foreach ($batiments as $batiment)
            <option value="{{ $batiment->id }}">{{ $batiment->name }}</option>
        @endforeach
    </select>
    <label for="floatingSelect">Batiments @json($system_id) </label>
    @error('batiment_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating  mb-3 col-md-6">
    <select class="form-select" wire:model.defer="system_id">
        <option value="null" disabled>{{ __('Sélectionner') }}</option>
        @foreach ($systems as $system)
            <option value="{{ $system->id }}">{{ $system->name }}</option>
        @endforeach
    </select>
    <label for="floatingSelect">Systèmes  @json($system_id) </label>
    @error('system_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
