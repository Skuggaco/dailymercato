<ul class="sidebar-menu">
    <li class="header">Données</li>
    <!-- Optionally, you can add icons to the links -->


    <li @if(Route::current()->getName() == '') class="active" @endif>
        <a href="{{ action('Backend\DashBoardController@index') }}"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'transferts') class="active treeview" @else class="treeview" @endif>
        <a href="{{ action('Backend\TransfersController@index') }}">
            <i class="fa fa-exchange"></i>
            <span>Transferts</span>
            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ action('Backend\TransfersController@index') }}">Tous</a></li>
            <li><a href="{{ action('Backend\TransfersController@index', ['sortBy' => 'currentSession']) }}">Session actuel</a></li>
        </ul>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'transferts') class="active treeview" @else class="treeview" @endif>
        <a href="{{ action('Backend\TransfersController@index', ['type' => 'rumours']) }}">
            <i class="fa fa-comments"></i>
            <span>Rumeurs</span>
            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ action('Backend\TransfersController@index', ['type' => 'rumours']) }}">Tous</a></li>
            <li><a href="{{ action('Backend\TransfersController@index', ['type' => 'rumours', 'sortBy' => 'currentSession']) }}">Session actuel</a></li>
        </ul>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'pays') class="active" @endif>
        <a href="{{ action('Backend\CountriesController@index') }}"><i class="fa fa-globe"></i> <span>Pays</span></a>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'ligues') class="active" @endif>
        <a href="{{ action('Backend\LeaguesController@index') }}"><i class="fa fa-flag"></i> <span>Ligues</span></a>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'postes') class="active" @endif>
        <a href="{{ action('Backend\PositionsController@index') }}"><i class="fa fa-soccer-ball-o"></i> <span>Postes</span></a>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'equipes') class="active" @endif>
        <a href="{{ action('Backend\TeamsController@index') }}"><i class="fa fa-users"></i> <span>Équipes</span></a>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'joueurs') class="active" @endif>
        <a href="{{ action('Backend\PlayersController@index') }}"><i class="fa fa-male"></i> <span>Joueurs</span></a>
    </li>
    <li @if(strtok(Route::current()->getName(), '.') == 'sessions') class="active" @endif>
        <a href="{{ action('Backend\SessionsController@index') }}"><i class="fa fa-clock-o"></i> <span>Sessions</span></a>
    </li>
</ul>