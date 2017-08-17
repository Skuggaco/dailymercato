@extends('admin.layouts.app')

@section('content')
    @include ('admin.partials.title', [
            'title'      => 'Ligues',
            'controller' => 'LeaguesController',
            'add'        => 'une ligue'
    ])
    <table class = "table table-striped table-bordered table-responsive">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Nom</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($leagues as $k => $l)
            <tr>
                <td class="text-center">{{ $k+1 }}</td>
                <td class="name-country">
                    @if(isset($l->imgCountry) && ($l->imgCountry))
                        <img src="/storage/{{ $l->imgCountry }}" class="flag">
                    @endif
                    <a href="{{ action('Backend\LeaguesController@show', $l->slugLeague) }}">{{ $l->nameLeague }}</a>
                </td>
                @include ('admin.partials.action', ['controller' => 'LeaguesController', 'id' => $l->id])
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $leagues->links() }}
@endsection