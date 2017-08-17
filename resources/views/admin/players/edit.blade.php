@extends('admin.layouts.app')

@section('content')
    <h1>Modifier un joueur : {{ $player->getFullNameAttribute() }}, slug : {{ $player->slugPlayer }}</h1>
    {!! Form::model($player, ['method' => 'PATCH', 'action' => ['Backend\PlayersController@update', $player->id]]) !!}
    @include('admin.players.form', ['submitText' => 'Modifier joueur'])
    {!! Form::close() !!}
@endsection