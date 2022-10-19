<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $reportDevis->id }}</p>
</div>

<!-- Section Id Field -->
<div class="form-group">
    {!! Form::label('section_id', 'Section Id:') !!}
    <p>{{ $reportDevis->section_id }}</p>
</div>

<!-- Devis Id Field -->
<div class="form-group">
    {!! Form::label('devis_id', 'Devis Id:') !!}
    <p>{{ $reportDevis->devis_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $reportDevis->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $reportDevis->updated_at }}</p>
</div>

