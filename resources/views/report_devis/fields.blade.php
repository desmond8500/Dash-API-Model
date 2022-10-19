<!-- Section Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('section_id', 'Section Id:') !!}
    {!! Form::text('section_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Devis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('devis_id', 'Devis Id:') !!}
    {!! Form::text('devis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reportDevis.index') }}" class="btn btn-secondary">Cancel</a>
</div>
