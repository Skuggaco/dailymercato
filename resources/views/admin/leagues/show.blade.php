@extends('admin.layouts.app')

@section('name_page', $league->nameLeague)

@section('content')
    <h2>Pays associé :</h2>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ action('Backend\CountriesController@show', $league->country->slugCountry) }}">
                <img src="/storage/{{ $league->country->imgCountry }}" alt="" class="flag">
                {{ $league->country->nameCountry }}
            </a>
        </li>
    </ul>

    <h2>Équipes associées :</h2>
    <ul class="list-group">
        @if(!empty($teams))
            @foreach($teams as $t)
                <li class="list-group-item">
                    <a href="{{ action('Backend\TeamsController@show', $t->slugTeam) }}">
                        <img src="/storage/{{ $t->imgTeam }}" alt="" class="logo">
                        {{ $t->nameLongTeam }}
                        ({{ $t->nameTeam }})
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
@endsection