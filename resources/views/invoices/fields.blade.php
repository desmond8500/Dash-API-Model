<!-- Projet Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projet_id', 'Projet Id:') !!}
    {!! Form::text('projet_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference', 'Reference:') !!}
    {!! Form::text('reference', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_name', 'Client Name:') !!}
    {!! Form::text('client_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_tel', 'Client Tel:') !!}
    {!! Form::text('client_tel', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_address', 'Client Address:') !!}
    {!! Form::text('client_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::text('discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Tva Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tva', 'Tva:') !!}
    {!! Form::text('tva', null, ['class' => 'form-control']) !!}
</div>

<!-- Brs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brs', 'Brs:') !!}
    {!! Form::text('brs', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
</div>
