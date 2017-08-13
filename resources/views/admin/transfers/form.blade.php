<div class="form-group">
    {!! Form::label('player_id', 'Joueur : ') !!}
    {!! Form::select('player_id', $listPlayers, null, ['placeholder' => 'Choisir un joueur', 'class' => 'form-control']); !!}
    <small class="text-danger">{{ $errors->first('player_id') }}</small>
</div>


@if(!isset($transfer))
<div class="form-group">
    {!! Form::label('choose_team', 'Ancien transfert officiel : ') !!}
    {!! Form::checkbox('choose_team', 1, null, ['id' => 'chooseTeam', 'class' => 'cbox']) !!}
</div>
<div class="form-group hide-choose_team">
    {!! Form::label('team_id_left', 'Équipe départ : ') !!}
    {!! Form::select('team_id_left', $listTeams, null, ['placeholder' => 'Choisir une équipe', 'class' => 'form-control']); !!}
    <small class="text-danger">{{ $errors->first('team_id_left') }}</small>
</div>
@endif

@isset($transfer)
<div class="form-group">
    {!! Form::label(null, 'Équipe départ : ') !!}
    <p class="form-control">{{ $transfer->getTeamLeft()->getFullNameTeamAttribute() }}</p>
</div>
@endisset


<div class="form-group">
    {!! Form::label('team_id_right', 'Équipe arrivée : ') !!}
    {!! Form::select('team_id_right', $listTeams, null, ['placeholder' => 'Choisir une équipe', 'class' => 'form-control']); !!}
    <small class="text-danger">{{ $errors->first('team_id_right') }}</small>
</div>
<div class="form-group">
    {!! Form::label('session_id', 'Session : ') !!}
    {!! Form::select('session_id', $listSessions, null, ['class' => 'form-control']); !!}
    <small class="text-danger">{{ $errors->first('session_id') }}</small>
</div>
<div class="form">
    {!! Form::label('offTransfer', 'Transfert officiel : ') !!}
    {!! Form::checkbox('offTransfer', 1, null, ['id' => 'offTransfer']) !!}
    <small class="text-danger">{{ $errors->first('offTransfer') }}</small>
</div>
<div class="form-group hide-transfer">
    {!! Form::label('amountTransfer', 'Montant : ') !!}
    {!! Form::text('amountTransfer', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('amountTransfer') }}</small>
</div>
<div class="form-group hide-transfer">
    {!! Form::label('linkTransfer', 'Lien article : ') !!}
    {!! Form::text('linkTransfer', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('linkTransfer') }}</small>
</div>
<div class="form-group hide-transfer">
    {!! Form::label('contractPlayer', 'Contrat jusqu\'au : ') !!}
    {!! Form::date('contractPlayer', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('contractPlayer') }}</small>
</div>
<div class = "form-group">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>