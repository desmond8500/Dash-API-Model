<!-- Report Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('report_id', 'Report Id:') !!}
    {!! Form::text('report_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Folder Field -->
<div class="form-group col-sm-6">
    {!! Form::label('folder', 'Folder:') !!}
    {!! Form::text('folder', null, ['class' => 'form-control']) !!}
</div>

<!-- Extension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extension', 'Extension:') !!}
    {!! Form::text('extension', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reportFiles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
