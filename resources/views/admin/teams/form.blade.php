<div class="box-body">
    <div class="form-group">
        {!! Form::label('nameTeam', 'Nom court : ') !!}
        {!! Form::text('nameTeam', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('nameTeam') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('nameLongTeam', 'Nom long : ') !!}
        {!! Form::text('nameLongTeam', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('nameLongTeam') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('imgTeam', 'Logo club : ') !!}
        {!! Form::file('imgTeam', ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('imgTeam') }}</small>
        @if(isset($team->imgTeam) && ($team->imgTeam))
            <img src="/storage/{{ $team->imgTeam }}">
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('league_id', 'Ligue : ') !!}
        {!! Form::select('league_id', $list, null, ['placeholder' => 'Choisir une ligue', 'class' => 'form-control']); !!}
        <small class="text-danger">{{ $errors->first('league_id') }}</small>
    </div>
</div>
<div class = "box-footer">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>