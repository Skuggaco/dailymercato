@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter un joueur</h1>
    {!! Form::open(['action' => 'Backend\PlayersController@store']) !!}
        @include('admin.players.form', ['submitText' => 'Ajouter joueur'])
    {!! Form::close() !!}
@endsection