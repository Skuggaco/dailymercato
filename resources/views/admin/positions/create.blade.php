@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter un poste</h1>
    {!! Form::open(['action' => 'Backend\PositionsController@store']) !!}
        @include('admin.positions.form', ['submitText' => 'Ajouter poste'])
    {!! Form::close() !!}
@endsection