<!-- Personne Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personne_id', 'Personne Id:') !!}
    {!! Form::text('personne_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ecole Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ecole', 'Ecole:') !!}
    {!! Form::text('ecole', null, ['class' => 'form-control']) !!}
</div>

<!-- Diplome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diplome', 'Diplome:') !!}
    {!! Form::text('diplome', null, ['class' => 'form-control']) !!}
</div>

<!-- Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debut', 'Debut:') !!}
    {!! Form::text('debut', null, ['class' => 'form-control']) !!}
</div>

<!-- Pays Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pays', 'Pays:') !!}
    {!! Form::text('pays', null, ['class' => 'form-control']) !!}
</div>

<!-- Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fin', 'Fin:') !!}
    {!! Form::text('fin', null, ['class' => 'form-control']) !!}
</div>

<!-- Ville Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ville', 'Ville:') !!}
    {!! Form::text('ville', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formations.index') }}" class="btn btn-secondary">Cancel</a>
</div>
