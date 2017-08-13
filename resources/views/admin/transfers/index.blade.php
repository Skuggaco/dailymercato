@extends('admin.layouts.app')

@section('content')
    @include ('admin.partials.title', [
            'title'      => 'Transferts',
            'controller' => 'TransfersController',
            'add'        => 'un transfert ou une rumeur'])

    <table class = "table table-bordered table-responsive">
        <thead>
        <tr>
            <th class="text-center">Date</th>
            <th>Joueur</th>
            <th>Équipe départ</th>
            <th>Équipe arrivée</th>
            <th>Session</th>
            <th>Montant</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($transfers as $transfer)
                @php($teamLeft = $transfer->getTeamLeft())
                @php($teamRight = $transfer->getTeamRight())

                <tr @if($transfer->activeTransfer == 0) class="inactive" @endif>
                    <th class="text-center">{{ $transfer->created_at->format('d/m/Y') }}</th>
                    <th>{{ $transfer->player->getFullNameAttribute() }}</th>
                    <th>
                        <a href="{{ action('Backend\TeamsController@show', $teamLeft->slugTeam) }}">
                            <img src="/storage/{{ $teamLeft->imgTeam }}" class="logo">
                            {{ $teamLeft->getFullNameTeamAttribute() }}
                        </a>
                    </th>
                    <th>
                        <a href="{{ action('Backend\TeamsController@show', $teamRight->slugTeam) }}">
                            <img src="/storage/{{ $teamRight->imgTeam }}" class="logo">
                            {{ $teamRight->getFullNameTeamAttribute() }}
                        </a>
                    </th>
                    <th>{{ $transfer->session->nameSession }}</th>
                    <th>{{ $transfer->getTreatAmountAttribute() }}</th>
                    @include ('admin.partials.action', ['controller' => 'TransfersController', 'id' => $transfer->id])
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $transfers->links() }}
@endsection