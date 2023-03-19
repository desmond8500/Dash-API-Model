<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $planning->id }}</p>
</div>

<!-- Batiment Id Field -->
<div class="form-group">
    {!! Form::label('batiment_id', 'Batiment Id:') !!}
    <p>{{ $planning->batiment_id }}</p>
</div>

<!-- System Id Field -->
<div class="form-group">
    {!! Form::label('system_id', 'System Id:') !!}
    <p>{{ $planning->system_id }}</p>
</div>

<!-- Tache Field -->
<div class="form-group">
    {!! Form::label('tache', 'Tache:') !!}
    <p>{{ $planning->tache }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $planning->date }}</p>
</div>

<!-- Etat Field -->
<div class="form-group">
    {!! Form::label('Etat', 'Etat:') !!}
    <p>{{ $planning->Etat }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $planning->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $planning->updated_at }}</p>
</div>

