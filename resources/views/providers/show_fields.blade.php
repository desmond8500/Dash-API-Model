<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $provider->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $provider->name }}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{{ $provider->logo }}</p>
</div>

<!-- Adress Field -->
<div class="form-group">
    {!! Form::label('adress', 'Adress:') !!}
    <p>{{ $provider->adress }}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $provider->website }}</p>
</div>

