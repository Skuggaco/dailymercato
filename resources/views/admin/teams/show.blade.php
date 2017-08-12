@extends('admin.layouts.app')

@section('content')
    <h1>
        <img src="/storage/{{ $team->imgTeam }}" alt="" class="logo">
        {{ $team->nameLongTeam }} ({{ $team->nameTeam }})
    </h1>

    <h2>Ligue associée :</h2>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ action('Backend\LeaguesController@show', $team->league->slugLeague) }}">
                <img src="/storage/{{ $team->league->country->imgCountry }}" alt="" class="flag">
                {{ $team->league->nameLeague }}
            </a>
        </li>
    </ul>

    <h2>Joueurs associés :</h2>
    <ul class="list-group">
        @if(!empty($players))
            @foreach($players as $p)
                <li class="list-group-item">
                    <img src="/storage/{{ $p->country->imgCountry }}" alt="" class="flag">
                    {{ $p->getFullNameAttribute() }}
                </li>
            @endforeach
        @endif
    </ul>
@endsection