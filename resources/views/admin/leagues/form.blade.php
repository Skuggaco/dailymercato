<div class="box-body">
    <div class="form-group">
        {!! Form::label('nameLeague', 'Nom : ') !!}
        {!! Form::text('nameLeague', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('nameLeague') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('country_id', 'Pays : ') !!}
        {!! Form::select('country_id', $list, null, ['placeholder' => 'Choisir un pays', 'class' => 'form-control']); !!}
        <small class="text-danger">{{ $errors->first('country_id') }}</small>
    </div>
</div>

<div class = "box-footer">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>