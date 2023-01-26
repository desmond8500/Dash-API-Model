<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $competence->id }}</p>
</div>

<!-- Personne Id Field -->
<div class="form-group">
    {!! Form::label('personne_id', 'Personne Id:') !!}
    <p>{{ $competence->personne_id }}</p>
</div>

<!-- Competence Field -->
<div class="form-group">
    {!! Form::label('competence', 'Competence:') !!}
    <p>{{ $competence->competence }}</p>
</div>

<!-- Niveau Field -->
<div class="form-group">
    {!! Form::label('niveau', 'Niveau:') !!}
    <p>{{ $competence->niveau }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $competence->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $competence->updated_at }}</p>
</div>

