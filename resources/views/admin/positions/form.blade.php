<div class="form-group">
    {!! Form::label('nameLongPosition', 'Nom complet : ') !!}
    {!! Form::text('nameLongPosition', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('nameLongPosition') }}</small>
</div>
<div class="form-group">
    {!! Form::label('namePosition', 'Abréviation : ') !!}
    {!! Form::text('namePosition', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('namePosition') }}</small>
</div>
<div class = "form-group">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>