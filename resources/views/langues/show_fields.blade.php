<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $langue->id }}</p>
</div>

<!-- Personne Id Field -->
<div class="form-group">
    {!! Form::label('personne_id', 'Personne Id:') !!}
    <p>{{ $langue->personne_id }}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $langue->nom }}</p>
</div>

<!-- Niveau Field -->
<div class="form-group">
    {!! Form::label('niveau', 'Niveau:') !!}
    <p>{{ $langue->niveau }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $langue->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $langue->updated_at }}</p>
</div>

