@extends('admin.layouts.app')

@section('content')
    @include ('admin.partials.title', [
            'title'      => 'Équipes',
            'controller' => 'TeamsController',
            'add'        => 'une équipe'])

    <table class = "table table-bordered table-responsive">
        <thead>
        <tr>
            <th class="text-center col-md-1">#</th>
            <th class="col-md-3">Ligue</th>
            <th class="col-md-5">Équipe</th>
            <th class="col-md-3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($leagues as $k => $l)
            <tr class = "teamsAjax classAjax" id = "{{ $l->id }}">
                <td class="text-center">{{ $k+1 }}</td>
                <td class="name-country">
                    @if(isset($l->country->imgCountry) && ($l->country->imgCountry))
                        <img src="/storage/{{ $l->country->imgCountry }}" class="flag">
                    @endif
                    <a href="{{ action('Backend\LeaguesController@show', $l->slugLeague) }}">
                        {{ $l->nameLeague }}
                    </a>
                </td>
                <td></td>
                <td class="chevronsAjax-{{ $l->id }} chevronsAjax">
                    <i class="fa fa-chevron-down down" aria-hidden="true"></i>
                    <i class="fa fa-chevron-up up" aria-hidden="true"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $leagues->links() }}
@endsection