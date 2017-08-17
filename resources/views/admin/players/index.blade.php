@extends('admin.layouts.app')

@section('name_page')
    <i class="fa fa-male"></i> <span class="title-marg">Joueurs</span>
@endsection

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.tableTitle', ['title' => 'joueurs', 'controller' => 'Players'])
        <div class="box-body">
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
        </div>
        <div class="box-footer">
            {{ $teams->links() }}
        </div>
    </div>
@endsection