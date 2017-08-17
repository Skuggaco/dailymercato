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
<div class="form-group">
    {!! Form::label('on_going', 'Ceci est la session en cours : ') !!}
    {!! Form::checkbox('on_going', 1, null, ['class' => 'checkboxOnGoing']) !!}
</div>
<div class = "form-group">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>