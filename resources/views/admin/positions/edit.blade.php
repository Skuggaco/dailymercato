@extends('admin.layouts.app')

@section('name_page', 'Modifier poste')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Editer un poste : '.$position->nameLongPosition.' ('.$position->namePosition.')'])
        {!! Form::model($position, ['method' => 'PATCH', 'action' => ['Backend\PositionsController@update', $position->id]]) !!}
            @include('admin.positions.form', ['submitText' => 'Editer le poste'])
        {!! Form::close() !!}
    </div>
@endsection