@extends('admin.layouts.app')

@section('name_page', 'Ajouter transferts')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Ajouter un transfert ou une rumeur'])
        {!! Form::open(['action' => 'Backend\TransfersController@store']) !!}
            @include('admin.transfers.form', ['submitText' => 'Ajouter transfert'])
        {!! Form::close() !!}
    </div>
@endsection