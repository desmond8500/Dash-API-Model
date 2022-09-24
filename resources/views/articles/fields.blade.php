<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference', 'Reference:') !!}
    {!! Form::text('reference', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand Id:') !!}
    {!! Form::text('brand_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provider_id', 'Provider Id:') !!}
    {!! Form::text('provider_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Storage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_id', 'Storage Id:') !!}
    {!! Form::text('storage_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Priority Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority', 'Priority:') !!}
    {!! Form::text('priority', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
