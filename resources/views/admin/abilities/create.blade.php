@extends('admin.layouts.app')

@section('name_page', 'Ajouter aptitude')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter une aptitude'])
        {!! Form::open(['action' => 'Backend\AbilitiesController@store']) !!}
            @include('admin.abilities.form', ['submitText' => 'Ajouter aptitude'])
        {!! Form::close() !!}
    </div>
@endsection