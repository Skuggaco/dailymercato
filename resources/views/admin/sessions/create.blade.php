@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter une session</h1>
    {!! Form::open(['action' => 'Backend\SessionsController@store']) !!}
        @include('admin.sessions.form', ['submitText' => 'Ajouter session'])
    {!! Form::close() !!}
@endsection