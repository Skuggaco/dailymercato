<div class="box-body">
    <div class="form-group">
        {!! Form::label('namePlayer', 'Prénom : ') !!}
        {!! Form::text('namePlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('namePlayer') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('surNamePlayer', 'Nom : ') !!}
        {!! Form::text('surNamePlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('surNamePlayer') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('birthdayPlayer', 'Date de naissance : ') !!}
        {!! Form::date('birthdayPlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('birthdayPlayer') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('contractPlayer', 'Contrat jusqu\'au : ') !!}
        {!! Form::date('contractPlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('contractPlayer') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('valuePlayer', 'Valeur marchande : ') !!}
        {!! Form::text('valuePlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('valuePlayer') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('country_id', 'Nationalité : ') !!}
        {!! Form::select('country_id', $listCountries, null, ['placeholder' => 'Choisir un pays', 'class' => 'form-control']); !!}
        <small class="text-danger">{{ $errors->first('country_id') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('position_id', 'Poste : ') !!}
        {!! Form::select('position_id', $listPositions, null, ['placeholder' => 'Choisir un poste', 'class' => 'form-control']); !!}
        <small class="text-danger">{{ $errors->first('position_id') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('team_id', 'Équipe actuel : ') !!}
        {!! Form::select('team_id', $listTeams, null, ['placeholder' => 'Choisir une équipe', 'class' => 'form-control']); !!}
        <small class="text-danger">{{ $errors->first('team_id') }}</small>
    </div>

    @if(isset($oldTeams))
    <div class="form-group">
        {!! Form::label(null, 'Ancienne(s) équipe(s) : ') !!}
        <a href="/admin/ancienne-equipe/create/{{ $player->id }}" class="btn btn-primary btn-xs">
            <i class="fa fa-plus-square-o text-green" aria-hidden="true"></i>
            Ajouter une équipe
        </a>
        <ul class="list-group">
            @foreach($oldTeams as $t)
                <li class="list-group-item">
                    <img src="/storage/{{ $t->imgTeam }}" class="logo">
                    {{ $t->getFullNameTeamAttribute() }}
                    <div class="delete-right">
                        <a href="/admin/ancienne-equipe/{{ $t->id }}/{{ $player->id }}" data-confirm="Voulez-vous vraiment supprimer cette donnée ?" data-method="delete" data-token="{{csrf_token()}}" class="btn btn-sm btn-danger btn-delete">
                            Supprimer
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group">
        {!! Form::label('twitterPlayer', 'Twitter : ') !!}
        {!! Form::text('twitterPlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('twitterPlayer') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('instagramPlayer', 'Instagram : ') !!}
        {!! Form::text('instagramPlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('instagramPlayer') }}</small>
    </div>
    <div class="form-group">
        {!! Form::label('snapchatPlayer', 'Snapchat : ') !!}
        {!! Form::text('snapchatPlayer', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('snapchatPlayer') }}</small>
    </div>
</div>

<div class = "box-footer">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>