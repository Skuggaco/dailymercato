@extends('admin.layouts.app')

@section('content')
    <h1>
        <img src="/storage/{{ $country->imgCountry }}" alt="" class="flag">
        {{ $country->nameCountry }}
    </h1>

    <h2>Ligue(s) associé(s) : </h2>
    <ul class="list-group">
        @if(!empty($leagues))
            @foreach($leagues as $l)
                <li class="list-group-item">
                    <a href="{{ action('Backend\LeaguesController@show', $l->slugLeague) }}">
                        {{ $l->nameLeague }}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>

@endsection