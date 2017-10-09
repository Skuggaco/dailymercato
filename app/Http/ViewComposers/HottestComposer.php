<?php

namespace App\Http\ViewComposers;

use App\Models\Transfer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class HottestComposer
{
    protected $name;

    public function __construct(){
        $this->name = 'transferts-plus-chauds';
    }

    public function compose(View $view){
        $get = collect(request()->segments())->last();

        $transfers = Transfer::with('teams.league', 'player.country', 'session')
                            ->select('*', DB::raw('(yesTransfer - noTransfer) as sort'))
                            ->where('offTransfer', '!=', '1')
                            ->where('activeTransfer', '=', '1')
                            ->whereHas('session', function($query){
                                $query->where('on_going', '=', 1);
                            });
        if(isset($get) && $get != $this->name){
            $transfers = $transfers->whereHas('teams.league', function($query) use($get){
                $query->where('left', '=', 0);
                $query->where('slugLeague', '=', $get);
            });
        }
        $transfers = $transfers->orderBy(DB::raw('sort'), 'desc')
                               ->paginate(2,['*'], 'hottestTab')->toJson();

        $view->with('transfers', json_decode($transfers, false))
             ->with('name', $this->name);
    }
}