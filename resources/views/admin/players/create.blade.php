@extends('admin.layouts.app')

@section('name_page', 'Ajouter joueur')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter un joueur'])
        {!! Form::open(['action' => 'Backend\PlayersController@store']) !!}
            @include('admin.players.form', ['submitText' => 'Ajouter joueur'])
        {!! Form::close() !!}
    </div>
@endsection