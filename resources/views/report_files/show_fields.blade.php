<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $reportFiles->id }}</p>
</div>

<!-- Report Id Field -->
<div class="form-group">
    {!! Form::label('report_id', 'Report Id:') !!}
    <p>{{ $reportFiles->report_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $reportFiles->name }}</p>
</div>

<!-- Folder Field -->
<div class="form-group">
    {!! Form::label('folder', 'Folder:') !!}
    <p>{{ $reportFiles->folder }}</p>
</div>

<!-- Extension Field -->
<div class="form-group">
    {!! Form::label('extension', 'Extension:') !!}
    <p>{{ $reportFiles->extension }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $reportFiles->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $reportFiles->updated_at }}</p>
</div>

