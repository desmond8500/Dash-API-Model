<div>
    @component('components.tabler.header', ['title'=>'Galaxy Names', 'subtitle'=>'Tools', 'breadcrumbs'=>$breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-6">
            <label class="form-label required">Texte à saisir</label>
            <div class="input-group">
                <input type="text" class="form-control" wire:model.defer="name" placeholder="Name">
                <button class="btn btn-primary" wire:click="convert">Valider</button>
            </div>
            <div class="p-2">
                @foreach ($result as $item)
                   <b style="font-size:15px">{{ $item }}</b>
                @endforeach
            </div>
        </div>
    <div>
</div>
