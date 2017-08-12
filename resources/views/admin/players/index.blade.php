@extends('admin.layouts.app')

@section('content')
    @include ('admin.partials.title', [
            'title'      => 'Joueurs',
            'controller' => 'PlayersController',
            'add'        => 'un joueur'])

    <table class = "table table-bordered table-responsive">
        <thead>
        <tr>
            <th class="text-center col-md-1">#</th>
            <th class="col-md-4">Équipe</th>
            <th class="col-md-4">Joueur</th>
            <th class="col-md-2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $k => $t)
            <tr class = "playersAjax classAjax" id = "{{ $t->id }}">
                <td class="text-center">{{ $k+1+$page }}</td>
                <td>
                    @if(isset($t->imgTeam) && ($t->imgTeam))
                        <img src="/storage/{{ $t->imgTeam }}" class="logo">
                    @endif
                    <a href="{{ action('Backend\TeamsController@show', $t->slugTeam) }}">
                        {{ $t->getFullNameTeamAttribute() }}
                    </a>
                </td>
                <td></td>
                <td class="chevronsAjax-{{ $t->id }} chevronsAjax">
                    <i class="fa fa-chevron-down down" aria-hidden="true"></i>
                    <i class="fa fa-chevron-up up" aria-hidden="true"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $teams->links() }}
@endsection