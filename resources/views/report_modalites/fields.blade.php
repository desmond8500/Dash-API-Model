<!-- Section Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('section_id', 'Section Id:') !!}
    {!! Form::text('section_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Duree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duree', 'Duree:') !!}
    {!! Form::text('duree', null, ['class' => 'form-control']) !!}
</div>

<!-- Technicien Field -->
<div class="form-group col-sm-6">
    {!! Form::label('technicien', 'Technicien:') !!}
    {!! Form::text('technicien', null, ['class' => 'form-control']) !!}
</div>

<!-- Ouvrier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ouvrier', 'Ouvrier:') !!}
    {!! Form::text('ouvrier', null, ['class' => 'form-control']) !!}
</div>

<!-- Complexite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complexite', 'Complexite:') !!}
    {!! Form::text('complexite', null, ['class' => 'form-control']) !!}
</div>

<!-- Risque Field -->
<div class="form-group col-sm-6">
    {!! Form::label('risque', 'Risque:') !!}
    {!! Form::text('risque', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reportModalites.index') }}" class="btn btn-secondary">Cancel</a>
</div>
