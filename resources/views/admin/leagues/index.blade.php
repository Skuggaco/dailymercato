@extends('admin.layouts.app')

@section('name_page')
    <i class="fa fa-flag"></i> <span class="title-marg">Ligues</span>
@endsection

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.tableTitle', ['title' => 'ligues', 'controller' => 'Leagues'])
        <div class="box-body">
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
        </div>
        <div class="box-footer">
            {{ $leagues->links() }}
        </div>
    </div>
@endsection