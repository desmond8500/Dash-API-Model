<!-- Batiment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('batiment_id', 'Batiment Id:') !!}
    {!! Form::text('batiment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- System Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('system_id', 'System Id:') !!}
    {!! Form::text('system_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tache Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tache', 'Tache:') !!}
    {!! Form::text('tache', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Etat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Etat', 'Etat:') !!}
    {!! Form::text('Etat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('plannings.index') }}" class="btn btn-secondary">Cancel</a>
</div>
