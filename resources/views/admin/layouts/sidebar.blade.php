<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/storage/design/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Rechercher...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Données</li>
            <!-- Optionally, you can add icons to the links -->


            <li @if(Route::current()->getName() == '') class="active" @endif>
                <a href="{{ action('Backend\DashBoardController@index') }}"><i class="fa fa-home"></i> <span>Accueil</span></a>
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
                    <li><a href="#">Session actuel</a></li>
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
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>