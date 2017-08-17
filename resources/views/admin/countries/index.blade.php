@extends('admin.layouts.app')

@section('content')
    @include ('admin.partials.title', [
            'title'      => 'Pays',
            'controller' => 'CountriesController',
            'add'        => 'un pays'
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
        @foreach($countries as $k => $c)
            <tr>
                <td class="text-center">{{ $k+1 }}</td>
                <td class="name-country">
                    @if(isset($c->imgCountry) && ($c->imgCountry))
                        <img src="/storage/{{ $c->imgCountry }}" class="flag">
                    @endif
                        <a href="{{ action('Backend\CountriesController@show', $c->slugCountry) }}">{{ $c->nameCountry }}</a>
                </td>
                @include ('admin.partials.action', ['controller' => 'CountriesController', 'id' => $c->id])
            </tr>

        @endforeach
        </tbody>
    </table>

    {{ $countries->links() }}
@endsection