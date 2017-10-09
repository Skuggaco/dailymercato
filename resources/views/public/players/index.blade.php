@extends('public.layouts.app')

@section('content')
    <div class="col-md-12">
        <h2 class="playername">
            <p>
                <a href = "">
                    <img src="/storage/{{ $player->country->imgCountry }}"
                         class="logoflagbig">
                </a>
            </p>
            <strong>{{ $player->getFullNameAttribute() }}</strong>
        </h2>
    </div>

    <div class="col-md-12">
        <table class="table table-responsive table-striped table-player">
            <thead>
                <tr>
                    <th class="col-xs-6">Fiche joueur</th>
                    <th class="col-xs-6"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <span class="table-left">Né/âge</span>
                        <span class="table-right">
                            {{ $player->getBirthdayPlayerFormatAttribute() }}
                            ({{ $player->getAgePlayerAttribute() }})
                        </span>
                    </th>
                    <th>
                        <span class="table-left">Poste</span>
                        <span class="table-right">{{ $player->position->nameLongPosition }}</span>
                    </th>
                </tr>
                <tr>
                    <th>
                        <span class="table-left">Club actuel</span>
                        <span class="table-right">{{ $player->getCurrentTeamAttribute()->nameTeam }}</span>
                    </th>
                    <th>
                        <span class="table-left">Contrat jusqu'au</span>
                        <span class="table-right">{{ $player->getContractPlayerFormatAttribute() }}</span>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>

    @include ('public.tabs.hottestTab')
@endsection