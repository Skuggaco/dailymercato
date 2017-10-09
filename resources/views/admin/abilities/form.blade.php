<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', 'Nom : ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
<div class = "box-footer">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>