<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $invoice->id }}</p>
</div>

<!-- Projet Id Field -->
<div class="form-group">
    {!! Form::label('projet_id', 'Projet Id:') !!}
    <p>{{ $invoice->projet_id }}</p>
</div>

<!-- Reference Field -->
<div class="form-group">
    {!! Form::label('reference', 'Reference:') !!}
    <p>{{ $invoice->reference }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $invoice->status }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $invoice->description }}</p>
</div>

<!-- Client Name Field -->
<div class="form-group">
    {!! Form::label('client_name', 'Client Name:') !!}
    <p>{{ $invoice->client_name }}</p>
</div>

<!-- Client Tel Field -->
<div class="form-group">
    {!! Form::label('client_tel', 'Client Tel:') !!}
    <p>{{ $invoice->client_tel }}</p>
</div>

<!-- Client Address Field -->
<div class="form-group">
    {!! Form::label('client_address', 'Client Address:') !!}
    <p>{{ $invoice->client_address }}</p>
</div>

<!-- Discount Field -->
<div class="form-group">
    {!! Form::label('discount', 'Discount:') !!}
    <p>{{ $invoice->discount }}</p>
</div>

<!-- Tva Field -->
<div class="form-group">
    {!! Form::label('tva', 'Tva:') !!}
    <p>{{ $invoice->tva }}</p>
</div>

<!-- Brs Field -->
<div class="form-group">
    {!! Form::label('brs', 'Brs:') !!}
    <p>{{ $invoice->brs }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $invoice->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $invoice->updated_at }}</p>
</div>

