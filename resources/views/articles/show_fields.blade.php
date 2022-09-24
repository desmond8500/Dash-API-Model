<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $article->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $article->name }}</p>
</div>

<!-- Reference Field -->
<div class="form-group">
    {!! Form::label('reference', 'Reference:') !!}
    <p>{{ $article->reference }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $article->description }}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $article->quantity }}</p>
</div>

<!-- Brand Id Field -->
<div class="form-group">
    {!! Form::label('brand_id', 'Brand Id:') !!}
    <p>{{ $article->brand_id }}</p>
</div>

<!-- Provider Id Field -->
<div class="form-group">
    {!! Form::label('provider_id', 'Provider Id:') !!}
    <p>{{ $article->provider_id }}</p>
</div>

<!-- Storage Id Field -->
<div class="form-group">
    {!! Form::label('storage_id', 'Storage Id:') !!}
    <p>{{ $article->storage_id }}</p>
</div>

<!-- Priority Field -->
<div class="form-group">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{{ $article->priority }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $article->price }}</p>
</div>

