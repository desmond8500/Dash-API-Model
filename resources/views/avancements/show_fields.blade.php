<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $avancement->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $avancement->name }}</p>
</div>

<!-- System Field -->
<div class="form-group">
    {!! Form::label('system', 'System:') !!}
    <p>{{ $avancement->system }}</p>
</div>

<!-- Building Id Field -->
<div class="form-group">
    {!! Form::label('building_id', 'Building Id:') !!}
    <p>{{ $avancement->building_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $avancement->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $avancement->updated_at }}</p>
</div>

