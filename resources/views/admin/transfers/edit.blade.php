@extends('admin.layouts.app')

@section('name_page', 'Modifier transfert')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Editer une rumeur du '.$transfer->created_at->format('d/m/Y')])
        {!! Form::model($transfer, ['method' => 'PATCH', 'action' => ['Backend\TransfersController@update', $transfer->id]]) !!}
            @include('admin.transfers.form', ['submitText' => 'Modifier transfert'])
        {!! Form::close() !!}
    </div>
@endsection