@extends('admin.layouts.app')

@section('name_page', 'Modifier session')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Modifier une session : '.$session->nameSession.', slug : '.$session->slugSession])
        {!! Form::model($session, ['method' => 'PATCH', 'action' => ['Backend\SessionsController@update', $session->id]]) !!}
            @include('admin.sessions.form', ['submitText' => 'Modifier session'])
        {!! Form::close() !!}
    </div>
@endsection