@extends('admin.layouts.app')

@section('name_page', 'Modifier aptitude')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Editer une aptitude : '.$ability->name])
        {!! Form::model($ability, ['method' => 'PATCH', 'action' => ['Backend\AbilitiesController@update', $ability->id]]) !!}
            @include('admin.abilities.form', ['submitText' => 'Editer l\'aptitude'])
        {!! Form::close() !!}
    </div>
@endsection