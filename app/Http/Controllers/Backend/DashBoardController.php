<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    /**
     * Show all the stats of every entities
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $tab['nbrCountry'] = Country::count('*');
        $tab['nbrLeague'] = League::count('*');
        $tab['nbrTeam'] = Team::count('*');
        $tab['nbrPlayer'] = Player::count('*');

        return view('admin.dashboard.index', compact('tab'));
    }
}
