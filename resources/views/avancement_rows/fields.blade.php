<!-- Int Avancement Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('int avancement_id', 'Int Avancement Id:') !!}
    {!! Form::text('int avancement_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Progress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('progress', 'Progress:') !!}
    {!! Form::text('progress', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('avancementRows.index') }}" class="btn btn-secondary">Cancel</a>
</div>
