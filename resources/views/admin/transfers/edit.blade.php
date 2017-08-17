@extends('admin.layouts.app')

@section('content')
    <h1>Modifier une rumeur du {{ $transfer->created_at->format('d/m/Y') }}</h1>
    {!! Form::model($transfer, ['method' => 'PATCH', 'action' => ['Backend\TransfersController@update', $transfer->id]]) !!}
        @include('admin.transfers.form', ['submitText' => 'Modifier transfert'])
    {!! Form::close() !!}
@endsection