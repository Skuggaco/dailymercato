@extends('admin.layouts.app')

@section('name_page')
    <img src="/storage/{{ $country->imgCountry }}" alt="" class="flag">
    {{ $country->nameCountry }}
@endsection

@section('content')
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