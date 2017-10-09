<table class="table table-responsive table-striped table-center {{ $class }}">
    <thead>
    <tr>
        <th class = "col-md-3 col-xs-4">Joueur</th>
        <th class="col-md-3 col-xs-1">de</th>
        <th class="col-md-3 col-xs-1">à</th>
        <th class = "action centered-th col-md-2 col-xs-3 spe-th">
            <span class="onlydesk">Prédiction</span>
            <span class="onlymob">Préd.</span>
        </th>
        <th class="col-md-1 centered-th col-xs-1 spe-th">
            <span class="onlydesk">Tendance</span>
            <span class="onlymob">Tend.</span>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($transfers->data as $t)
        <?php
        if($t->teams[0]->pivot->left == 0){
            $teamRight = $t->teams[0];
            $teamLeft = $t->teams[1];
        } else{
            $teamLeft = $t->teams[0];
            $teamRight = $t->teams[1];
        }
        ?>
        <tr>
            <td class="nextTo">
                <div class="col-md-1 col-xs-1 hidden-xs">
                    <a href = "">
                        <img class="logoflag"
                             src="/storage/{{ $t->player->country->imgCountry }}">
                    </a>
                </div>
                <div class="col-md-10 col-xs-10 leftY mobsp">
                    <p>
                        <a href="/joueur/{{ $t->player->slugPlayer }}">
                            <span class="onlydesk">{{ $t->player->full_name }}</span>
                            <span class="onlymob">{{ $t->player->surNamePlayer }}</span>
                        </a>
                    </p>
                </div>
            </td>
            <td class="nextTo">
                <div class="col-md-1 col-xs-12">
                    <a href = "">
                        <img class="logoclub" src="/storage/{{ $teamLeft->imgTeam }}">
                    </a>
                </div>
                <div class="col-md-7 hidden-xs hidden-sm leftY">
                    <p>
                        <a href = "">
                            <span class="hide_mob">{{ $teamLeft->nameTeam }}</span>
                        </a>
                    </p>
                </div>
            </td>
            <td class="nextTo">
                <div class="col-md-1 col-xs-12">
                    <a href = "">
                        <img class="logoclub" src="/storage/{{ $teamRight->imgTeam }}">
                    </a>
                </div>
                <div class="col-md-7 hidden-xs hidden-sm leftY">
                    <p>
                        <a href="">
                            <span class="hide_mob">{{ $teamRight->nameTeam }}</span>
                        </a>
                    </p>
                </div>
            </td>
            <td class = "vote V{{ $t->id }}">
                <p class="col-md-6 col-xs-6 rp npad leftY">
                    <strong value="{{ $t->id }}" class="btn-sm btn-success oui glyphicon glyphicon-thumbs-up"></strong>
                </p>
                <p class="col-md-6 col-xs-6 lp npad leftY">
                    <strong value="{{ $t->id }} $t->id }}" class="btn-sm btn-danger non glyphicon glyphicon-thumbs-down"></strong>
                </p>
            </td>
            <td class="none centered-th">
                <span class="glyphicon glyphicon-check"></span> Merci
            </td>

            <td class="pas centered-th">
                <em class = "">
                    @if($t->yesTransfer == 0 and $t->noTransfer == 0)
                        50%
                    @else
                        {{ round($t->yesTransfer / ($t->yesTransfer + $t->noTransfer) * 100) }}%
                    @endif
                </em>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>