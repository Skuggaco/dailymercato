@extends('admin.layouts.app')

@section('name_page', 'Ajouter équipe')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter une équipe'])
        {!! Form::open(['action' => 'Backend\TeamsController@store', 'files' => true]) !!}
            @include('admin.teams.form', ['submitText' => 'Ajouter équipe'])
        {!! Form::close() !!}
    </div>
@endsection