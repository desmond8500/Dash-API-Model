<form wire:submit.prevent='update_task' class="row">
    @include('_tabler.erp.planning_form')
    <div class="btn-list">
        <button type="button" class="btn btn-secondary" wire:click="$set('planning_id', 0)">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</form>
