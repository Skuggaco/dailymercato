@extends('admin.layouts.app')

@section('name_page', 'Ajouter pays')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter un pays'])
        {!! Form::open(['action' => 'Backend\CountriesController@store', 'files' => true]) !!}
            @include('admin.countries.form', ['submitText' => 'Ajouter pays'])
        {!! Form::close() !!}
    </div>
@endsection