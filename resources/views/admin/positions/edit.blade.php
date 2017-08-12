@extends('admin.layouts.app')

@section('content')
    <h1>Editer un poste : {{ $position->nameLongPosition }} ({{ $position->namePosition }})</h1>
    {!! Form::model($position, ['method' => 'PATCH', 'action' => ['Backend\PositionsController@update', $position->id]]) !!}
    @include('admin.positions.form', ['submitText' => 'Editer le poste'])
    {!! Form::close() !!}
@endsection