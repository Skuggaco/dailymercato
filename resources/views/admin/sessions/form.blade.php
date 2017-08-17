<div class="box-body">
    <div class="form-group">
        {!! Form::label('nameSession', 'Nom : ') !!}
        {!! Form::text('nameSession', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('nameSession') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('dateSession', 'Mercato d\' : ') !!}
        <label class="radio-inline">{!! Form::radio('dateSession', 'winter') !!} Hiver</label>
        <label class="radio-inline">{!! Form::radio('dateSession', 'summer') !!} Été</label>
        <small class="text-danger">{{ $errors->first('dateSession') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('yearSession', 'Année : ') !!}
        {!! Form::select('yearSession', $listYears, null, ['placeholder' => 'Choisir une année', 'class' => 'form-control']); !!}
        <small class="text-danger">{{ $errors->first('yearSession') }}</small>
    </div>
    <div class="checkbox">
        <label>
            {!! Form::checkbox('on_going', 1, null, ['class' => '']) !!}
            Ceci est la session en cours
        </label>
    </div>
</div>
<div class = "box-footer">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>