@extends('admin.layouts.app')

@section('name_page')
    <i class="fa fa-dashboard"></i> <span class="title-marg">Tableau de bord</span>
@endsection

@section('content')
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
                <li class="list-group-item">{{ $tab['nbrRumour'] }} rumeurs ont été créées</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4>Nombre de transfert :</h4>
            <ul class="list-group">
                <li class="list-group-item">{{ $tab['nbrOff'] }} transferts ont été créés</li>
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