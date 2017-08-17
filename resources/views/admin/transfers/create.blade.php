@extends('admin.layouts.app')

@section('name_page')
    Ajouter transferts
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ajouter un transfert ou une rumeur</h3>
        </div>
        {!! Form::open(['action' => 'Backend\TransfersController@store']) !!}
            @include('admin.transfers.form', ['submitText' => 'Ajouter transfert'])
        {!! Form::close() !!}
    </div>
@endsection