<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $avancementSubRow->id }}</p>
</div>

<!-- Avancement Row Id Field -->
<div class="form-group">
    {!! Form::label('avancement_row_id', 'Avancement Row Id:') !!}
    <p>{{ $avancementSubRow->avancement_row_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $avancementSubRow->name }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $avancementSubRow->start }}</p>
</div>

<!-- End Field -->
<div class="form-group">
    {!! Form::label('end', 'End:') !!}
    <p>{{ $avancementSubRow->end }}</p>
</div>

<!-- Progress Field -->
<div class="form-group">
    {!! Form::label('progress', 'Progress:') !!}
    <p>{{ $avancementSubRow->progress }}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $avancementSubRow->comment }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $avancementSubRow->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $avancementSubRow->updated_at }}</p>
</div>

