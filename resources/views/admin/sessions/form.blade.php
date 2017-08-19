<div class="box-body">
    <div class="form-group">
        {!! Form::label('nameSession', 'Nom : ') !!}
        {!! Form::text('nameSession', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('nameSession') }}</small>
    </div>
    <div class="checkbox">
        {!! Form::label('dateSession', 'Mercato d\' : ', ['id' => 'label-date']) !!}
        {!! Form::radio('dateSession', 'winter', null, ['id' => 'winter']) !!}
        <label for="winter" id="label-winter">Hiver</label>
        {!! Form::radio('dateSession', 'summer', null, ['id' => 'summer']) !!}
        <label for="summer">Été</label>
        <small class="text-danger">{{ $errors->first('dateSession') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('yearSession', 'Année : ') !!}
        {!! Form::select('yearSession', $listYears, null, ['placeholder' => 'Choisir une année', 'class' => 'form-control']); !!}
        <small class="text-danger">{{ $errors->first('yearSession') }}</small>
    </div>
    <div class="checkbox">
            {!! Form::checkbox('on_going', 1, null, ['id' => 'on_going']) !!}
        <label for="on_going">Ceci est la session en cours</label>
    </div>
</div>
<div class = "box-footer">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>