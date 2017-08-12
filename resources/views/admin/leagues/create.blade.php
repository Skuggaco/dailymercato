@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter une ligue</h1>
    {!! Form::open(['action' => 'Backend\LeaguesController@store']) !!}
        @include('admin.leagues.form', ['submitText' => 'Ajouter ligue'])
    {!! Form::close() !!}
@endsection