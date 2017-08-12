@extends('admin.layouts.app')

@section('content')
    <h1>Editer une ligue : {{ $league->nameLeague }}, slug {{ $league->slugLeague }}</h1>
    {!! Form::model($league, ['method' => 'PATCH', 'action' => ['Backend\LeaguesController@update', $league->id]]) !!}
        @include('admin.leagues.form', ['submitText' => 'Editer la ligue'])
    {!! Form::close() !!}
@endsection