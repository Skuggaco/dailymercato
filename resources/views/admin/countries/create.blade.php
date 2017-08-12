@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter un pays</h1>
    {!! Form::open(['action' => 'Backend\CountriesController@store', 'files' => true]) !!}
        @include('admin.countries.form', ['submitText' => 'Ajouter pays'])
    {!! Form::close() !!}
@endsection