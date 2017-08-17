@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter une équipe</h1>
    {!! Form::open(['action' => 'Backend\TeamsController@store', 'files' => true]) !!}
        @include('admin.teams.form', ['submitText' => 'Ajouter équipe'])
    {!! Form::close() !!}
@endsection