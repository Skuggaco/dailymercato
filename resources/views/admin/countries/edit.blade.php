@extends('admin.layouts.app')

@section('content')
    <h1>Editer un pays : {{ $country->nameCountry }}, slug : {{ $country->slugCountry }}</h1>
    {!! Form::model($country, ['method' => 'PATCH', 'action' => ['Backend\CountriesController@update', $country->id], 'files' => true]) !!}
        @include('admin.countries.form', ['submitText' => 'Editer le pays'])
    {!! Form::close() !!}
@endsection