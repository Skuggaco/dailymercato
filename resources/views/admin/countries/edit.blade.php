@extends('admin.layouts.app')

@section('name_page', 'Modifier pays')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Editer un pays : '.$country->nameCountry.', slug : '.$country->slugCountry])
        {!! Form::model($country, ['method' => 'PATCH', 'action' => ['Backend\CountriesController@update', $country->id], 'files' => true]) !!}
            @include('admin.countries.form', ['submitText' => 'Editer le pays'])
        {!! Form::close() !!}
    </div>
@endsection