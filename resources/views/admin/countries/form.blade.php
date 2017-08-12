<div class="form-group">
    {!! Form::label('nameCountry', 'Nom : ') !!}
    {!! Form::text('nameCountry', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('nameCountry') }}</small>
</div>
<div class="form-group">
    {!! Form::label('imgCountry', 'Image du pays : ') !!}
    {!! Form::file('imgCountry', ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('imgCountry') }}</small>
    @if(isset($country->imgCountry) && ($country->imgCountry))
    <img src="/storage/{{ $country->imgCountry }}" alt="" width="14px" height="19px">
    @endif
</div>
<div class = "form-group">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>