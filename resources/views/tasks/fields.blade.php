<!-- Devis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('devis_id', 'Devis Id:') !!}
    {!! Form::text('devis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Objet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('objet', 'Objet:') !!}
    {!! Form::text('objet', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::text('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Priority Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority_id', 'Priority Id:') !!}
    {!! Form::text('priority_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
</div>
