@extends('admin.layouts.app')

@section('content')
    <h1>Ajouter un transfert ou une rumeur</h1>
    {!! Form::open(['action' => 'Backend\TransfersController@store']) !!}
    @include('admin.transfers.form', ['submitText' => 'Ajouter transfert'])
    {!! Form::close() !!}
@endsection