@extends('admin.layouts.app')

@section('name_page', 'Ajouter ligue')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter une ligue'])
        {!! Form::open(['action' => 'Backend\LeaguesController@store']) !!}
            @include('admin.leagues.form', ['submitText' => 'Ajouter ligue'])
        {!! Form::close() !!}
    </div>
@endsection