@extends('admin.layouts.app')

@section('name_page', 'Ajouter session')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter session'])
        {!! Form::open(['action' => 'Backend\SessionsController@store']) !!}
            @include('admin.sessions.form', ['submitText' => 'Ajouter session'])
        {!! Form::close() !!}
    </div>
@endsection