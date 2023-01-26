<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $experience->id }}</p>
</div>

<!-- Personne Id Field -->
<div class="form-group">
    {!! Form::label('personne_id', 'Personne Id:') !!}
    <p>{{ $experience->personne_id }}</p>
</div>

<!-- Pays Field -->
<div class="form-group">
    {!! Form::label('pays', 'Pays:') !!}
    <p>{{ $experience->pays }}</p>
</div>

<!-- Ville Field -->
<div class="form-group">
    {!! Form::label('ville', 'Ville:') !!}
    <p>{{ $experience->ville }}</p>
</div>

<!-- Debut Field -->
<div class="form-group">
    {!! Form::label('debut', 'Debut:') !!}
    <p>{{ $experience->debut }}</p>
</div>

<!-- Fin Field -->
<div class="form-group">
    {!! Form::label('fin', 'Fin:') !!}
    <p>{{ $experience->fin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $experience->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $experience->updated_at }}</p>
</div>

<!-- Entreprise Field -->
<div class="form-group">
    {!! Form::label('entreprise', 'Entreprise:') !!}
    <p>{{ $experience->entreprise }}</p>
</div>

