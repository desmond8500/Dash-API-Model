<!-- Room Article Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_article_id', 'Room Article Id:') !!}
    {!! Form::text('room_article_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Saignee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saignee', 'Saignee:') !!}
    {!! Form::text('saignee', null, ['class' => 'form-control']) !!}
</div>

<!-- Fourreau Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fourreau', 'Fourreau:') !!}
    {!! Form::text('fourreau', null, ['class' => 'form-control']) !!}
</div>

<!-- Enduit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enduit', 'Enduit:') !!}
    {!! Form::text('enduit', null, ['class' => 'form-control']) !!}
</div>

<!-- Tirage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tirage', 'Tirage:') !!}
    {!! Form::text('tirage', null, ['class' => 'form-control']) !!}
</div>

<!-- Pose Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pose', 'Pose:') !!}
    {!! Form::text('pose', null, ['class' => 'form-control']) !!}
</div>

<!-- Connexion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('connexion', 'Connexion:') !!}
    {!! Form::text('connexion', null, ['class' => 'form-control']) !!}
</div>

<!-- Test Field -->
<div class="form-group col-sm-6">
    {!! Form::label('test', 'Test:') !!}
    {!! Form::text('test', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service', 'Service:') !!}
    {!! Form::text('service', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('roomArticleDetails.index') }}" class="btn btn-secondary">Cancel</a>
</div>
