<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $avancementRow->id }}</p>
</div>

<!-- Int Avancement Id Field -->
<div class="form-group">
    {!! Form::label('int avancement_id', 'Int Avancement Id:') !!}
    <p>{{ $avancementRow->int avancement_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $avancementRow->name }}</p>
</div>

<!-- Progress Field -->
<div class="form-group">
    {!! Form::label('progress', 'Progress:') !!}
    <p>{{ $avancementRow->progress }}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $avancementRow->comment }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $avancementRow->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $avancementRow->updated_at }}</p>
</div>

