<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $task->id }}</p>
</div>

<!-- Devis Id Field -->
<div class="form-group">
    {!! Form::label('devis_id', 'Devis Id:') !!}
    <p>{{ $task->devis_id }}</p>
</div>

<!-- Objet Field -->
<div class="form-group">
    {!! Form::label('objet', 'Objet:') !!}
    <p>{{ $task->objet }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $task->description }}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{{ $task->status_id }}</p>
</div>

<!-- Priority Id Field -->
<div class="form-group">
    {!! Form::label('priority_id', 'Priority Id:') !!}
    <p>{{ $task->priority_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $task->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $task->updated_at }}</p>
</div>

