@extends('admin.layouts.app')

@section('content')
    <h1>Modifier une session : {{ $session->nameSession }}, slug : {{ $session->slugSession }}</h1>
    {!! Form::model($session, ['method' => 'PATCH', 'action' => ['Backend\SessionsController@update', $session->id]]) !!}
    @include('admin.sessions.form', ['submitText' => 'Modifier session'])
    {!! Form::close() !!}
@endsection