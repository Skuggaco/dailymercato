<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use App\Http\Controllers\Controller;
use App\Models\Transfer;

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
        $tab['nbrRumour'] = Transfer::where('offTransfer', '=', 0)
                                        ->count('*');
        $tab['nbrOff'] = Transfer::where('offTransfer', '=', 1)
                                        ->count('*');
        return view('admin.dashboard.index', compact('tab'));
    }
}
