@extends('admin.layouts.app')

@section('name_page', 'Modifier joueur')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Modifier un joueur : '.$player->getFullNameAttribute().', slug : '.$player->slugPlayer])
        {!! Form::model($player, ['method' => 'PATCH', 'action' => ['Backend\PlayersController@update', $player->id]]) !!}
            @include('admin.players.form', ['submitText' => 'Modifier joueur'])
        {!! Form::close() !!}
    </div>
@endsection