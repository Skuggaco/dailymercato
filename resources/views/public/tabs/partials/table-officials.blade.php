<table class="table table-responsive table-striped table-center {{ $class }}">
    <thead>
        <tr>
            @if(isset($rank) && $rank)
                <th class="centered-th col-md-1 hidden-xs">#</th>
            @endif
            <th class = "col-md-3 col-xs-4">Joueur</th>
            <th class="col-md-3 col-xs-1">de</th>
            <th class="col-md-3 col-xs-1">à</th>
            <th class = "action centered-th col-md-1 spe-th col-xs-3">Montant</th>
            <th class="col-md-1 centered-th col-xs-1 spe-th">Lien</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transfers->data as $k => $t)
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
            @if(isset($rank) && $rank)
                <td class="centered-th hidden-xs">{{ $k }}</td>
            @endif
            <td class="nextTo">
                <div class="col-md-1 col-xs-1 hidden-xs">
                    <a href = "">
                        <img class="logoflag" src="/storage/{{ $t->player->country->imgCountry }}">
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
            <td class="centered-th">{{ $t->treat_amount }}</td>
            <td class="pas centered-th"><a target="_blank" href = "{{ $t->linkTransfer }}"><span class="glyphicon glyphicon-link"></span></a></td>
        </tr>
    @endforeach
    </tbody>
</table>