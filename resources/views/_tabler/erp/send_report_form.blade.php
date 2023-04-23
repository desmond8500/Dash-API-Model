<div class="col-md-4 mb-3">
    <label class="form-label required">Destinataire</label>
    <input type="mail" class="form-control" wire:model.defer="report_mail" placeholder="Email">
    @error('report_mail') <span class="text-danger">{{ $message }}</span> @enderror
</div>
