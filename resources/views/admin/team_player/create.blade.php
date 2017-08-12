@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter un ancienne équipe au joueur : {{ $player->getfullNameAttribute() }}</h1>
    {!! Form::open(['url' => '/admin/ancienne-equipe/store/'.$player->id]) !!}
        <div class="form-group">
            {!! Form::label('team_id', 'Équipe : ') !!}
            {!! Form::select('team_id', $listTeams, null, ['placeholder' => 'Choisir une équipe', 'class' => 'form-control']); !!}
            <small class="text-danger">{{ $errors->first('team_id') }}</small>
        </div>
        <div class = "form-group">
            {!! Form::submit('Ajouter équipe', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection