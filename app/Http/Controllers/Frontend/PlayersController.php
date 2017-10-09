<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends BaseController
{
    public function index($slug){
        $player = Player::with(['teams', 'country', 'position'])
                        ->where('slugPlayer', '=', $slug)
                        ->first();
        return view('public.players.index', compact('player'));
    }
}
