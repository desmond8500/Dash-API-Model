<div class="col-md-8 mb-3">
    <label class="form-label">Titre de la section</label>
    <div class="input-group">
        <input type="text" class="form-control" wire:model.defer="section_title"/>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M15 4v8h3.586a1 1 0 0 1 .707 1.707l-6.586 6.586a1 1 0 0 1 -1.414 0l-6.586 -6.586a1 1 0 0 1 .707 -1.707h3.586v-8a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1z"></path> </svg> --}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                @foreach ($titles as $title)
                    <li><a class="dropdown-item" wire:click="set_section_title('{{ $title }}')">{{ $title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @error('section_title') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-md-4 mb-3">
    <label class="form-label">Ordre</label>
    <input type="number" class="form-control" min="0" wire:model.defer="section_order"/>
    @error('section_order') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div>
    <label class="form-label">Description de la section</label>
    <textarea class="form-control" data-bs-toggle="autosize" wire:model.defer="section_description"></textarea>
    @error('section_description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
