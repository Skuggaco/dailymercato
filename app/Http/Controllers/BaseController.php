<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct(){
        $players = DB::table('players')
                        ->join('countries as c', 'c.id', '=', 'players.country_id')
                        ->where(DB::raw('DATE_FORMAT(players.birthdayPlayer, \'%m-%d\')'), '=', DB::raw('DATE_FORMAT(NOW(), \'%m-%d\')'))
                        ->select('c.*', 'players.*')
                        ->get();
        View::share('birthdayPlayers', $players);
    }
}
