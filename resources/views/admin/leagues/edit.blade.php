@extends('admin.layouts.app')

@section('name_page', 'Modifier ligue')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Editer une ligue : '.$league->nameLeague.', slug : '.$league->slugLeague])
        {!! Form::model($league, ['method' => 'PATCH', 'action' => ['Backend\LeaguesController@update', $league->id]]) !!}
            @include('admin.leagues.form', ['submitText' => 'Editer la ligue'])
        {!! Form::close() !!}
    </div>
@endsection