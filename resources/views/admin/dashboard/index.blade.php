@extends('admin.layouts.app')

@section('content')
    <h1>Tableau de bord</h1>

    <div class="row">
        <div class="col-md-6">
            <h4>Nombre de pays :</h4>
            <ul class="list-group">
                <li class="list-group-item">{{ $tab['nbrCountry'] }} pays ont été créés</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4>Nombre de ligue :</h4>
            <ul class="list-group">
                <li class="list-group-item">{{ $tab['nbrLeague'] }} ligues ont été créées</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Nombre d'équipe :</h4>
            <ul class="list-group">
                <li class="list-group-item">{{ $tab['nbrTeam'] }} équipes ont été créées</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4>Nombre de joueur :</h4>
            <ul class="list-group">
                <li class="list-group-item">{{ $tab['nbrPlayer'] }} joueurs ont été créés</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Nombre de rumeur :</h4>
            <ul class="list-group">
                <li class="list-group-item"></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4>Nombre de transfert :</h4>
            <ul class="list-group">
                <li class="list-group-item"></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Nombre de vote total :</h4>
            <ul class="list-group">
                <li class="list-group-item"></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4>Nombre de page :</h4>
            <ul class="list-group">
                <li class="list-group-item"></li>
            </ul>
        </div>
    </div>
@endsection