@extends('admin.layouts.app')

@section('content')
    <h1>Editer une équipe : {{ $team->nameTeam }}, slug : {{ $team->slugTeam }}</h1>
    {!! Form::model($team, ['method' => 'PATCH', 'action' => ['Backend\TeamsController@update', $team->id], 'files' => true]) !!}
        @include('admin.teams.form', ['submitText' => 'Editer l\équipe'])
    {!! Form::close() !!}
@endsection