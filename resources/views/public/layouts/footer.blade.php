</div>
<footer>
    <div class="container">
        <div class="col-md-2 hidden-xs">
            <p>
                <a href = "/">
                    <img src="/storage/design/logoblack.png" width="50px" height="50px">
                </a>
            </p>
        </div>

        <div class="anniv col-md-5">
            <p>Les anniversaires du {{ date("d/m") }}</p>
            <ul>
                @if(isset($birthdayPlayers) && $birthdayPlayers)
                    @foreach($birthdayPlayers as $p)
                    <li>
                        <p>
                            <a href="#">
                                <img src="/storage/{{ $p->imgCountry }}" width="22.8px" height="15px">
                            </a>
                        </p>
                        <p class="pad">
                            <a href = "#">
                                {{ $p->namePlayer }} {{ $p->surNamePlayer }}
                                {{ $p->getAgePlayerAttribute() }}
                            </a>
                        </p>
                    </li>
                    @endforeach
                @else
                <li>Rien à afficher</li>
                @endif
            </ul>
        </div>
        <div class="anniv col-md-5 nav-foot">
            <p>Navigation</p>
            <ul>
                <li><a href ="/mentions">Mentions légales</a></li>
                <li><a href ="/apropos">- À propos -</a></li>
                <li><a href ="mailto:contact@dailymercato.com">Contact</a></li>
            </ul>
        </div>
        <div class="col-md-offset-2 col-md-10 anniv">
            <p>Les joueurs à suivre</p>
            <ul>
                <li>
                    <a href="https://www.dailymercato.com/joueur/junior-neymar-6">Júnior Neymar
                    </a>
                </li>
                <li>
                    <a href="https://www.dailymercato.com/joueur/kylian-mbappe-21">Kylian Mbappé
                    </a>
                </li>
                <li>
                    <a href="https://www.dailymercato.com/joueur/alexis-sanchez-13">
                        Alexis Sanchez
                    </a>
                </li>
                <li>
                    <a href="https://www.dailymercato.com/joueur/ousmane-dembele-37">Ousmane Dembélé
                    </a>
                </li>
                <li>
                    <a href="https://www.dailymercato.com/joueur/philippe-coutinho-14">Philippe Coutinho
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-12 centered">
            <p class="copyright">Copyright © 2017 dailymercato - Tous droits réservés</p>
            <p class="onlymob">
                <a href = "/">
                    <img src="/storage/design/logoblack.png" width="50px" height="50px">
                </a>
            </p>
        </div>
    </div>
</footer>

@include ('public.partials.scripts')
</body>

</html>
