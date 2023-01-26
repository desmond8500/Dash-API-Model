<!-- Personne Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personne_id', 'Personne Id:') !!}
    {!! Form::text('personne_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Niveau Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niveau', 'Niveau:') !!}
    {!! Form::text('niveau', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('langues.index') }}" class="btn btn-secondary">Cancel</a>
</div>
