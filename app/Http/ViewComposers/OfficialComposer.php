<?php

namespace App\Http\ViewComposers;

use App\Models\Transfer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class OfficialComposer
{
    protected $name;

    public function __construct(){
        $this->name = 'classement-des-plus-gros-transferts';
    }

    public function compose(View $view){
        $transfers = Transfer::with('teams.league', 'player.country', 'session')
                                ->where('offTransfer', '=', '1')
                                ->where('activeTransfer', '=', '1')
                                ->whereHas('session', function($query){
                                    $query->where('on_going', '=', 1);
                                })
                                ->orderBy('created_at', 'desc')
                                ->paginate(2, ['*'], 'officialTab')
                                ->toJson();

        $view->with('transfers', json_decode($transfers, false))
             ->with('name', $this->name);
    }
}