@extends('admin.layouts.app')

@section('name_page', 'Ajouter poste')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter un poste'])
        {!! Form::open(['action' => 'Backend\PositionsController@store']) !!}
            @include('admin.positions.form', ['submitText' => 'Ajouter poste'])
        {!! Form::close() !!}
    </div>
@endsection