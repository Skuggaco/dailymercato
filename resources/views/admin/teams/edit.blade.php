@extends('admin.layouts.app')

@section('name_page', 'Modifier équipe')

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.formTitle', ['title' => 'Editer une équipe : '.$team->nameTeam.', slug : '.$team->slugTeam])
        {!! Form::model($team, ['method' => 'PATCH', 'action' => ['Backend\TeamsController@update', $team->id], 'files' => true]) !!}
            @include('admin.teams.form', ['submitText' => 'Editer l\équipe'])
        {!! Form::close() !!}
    </div>
@endsection