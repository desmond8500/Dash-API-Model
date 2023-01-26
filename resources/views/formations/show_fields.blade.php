<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $formation->id }}</p>
</div>

<!-- Personne Id Field -->
<div class="form-group">
    {!! Form::label('personne_id', 'Personne Id:') !!}
    <p>{{ $formation->personne_id }}</p>
</div>

<!-- Ecole Field -->
<div class="form-group">
    {!! Form::label('ecole', 'Ecole:') !!}
    <p>{{ $formation->ecole }}</p>
</div>

<!-- Diplome Field -->
<div class="form-group">
    {!! Form::label('diplome', 'Diplome:') !!}
    <p>{{ $formation->diplome }}</p>
</div>

<!-- Debut Field -->
<div class="form-group">
    {!! Form::label('debut', 'Debut:') !!}
    <p>{{ $formation->debut }}</p>
</div>

<!-- Pays Field -->
<div class="form-group">
    {!! Form::label('pays', 'Pays:') !!}
    <p>{{ $formation->pays }}</p>
</div>

<!-- Fin Field -->
<div class="form-group">
    {!! Form::label('fin', 'Fin:') !!}
    <p>{{ $formation->fin }}</p>
</div>

<!-- Ville Field -->
<div class="form-group">
    {!! Form::label('ville', 'Ville:') !!}
    <p>{{ $formation->ville }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $formation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $formation->updated_at }}</p>
</div>

