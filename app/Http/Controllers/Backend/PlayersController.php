<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class PlayersController extends Controller
{
    private $redirectLink = 'Backend\PlayersController@index';

    /**
     * Show all teams where there is at least one player
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $nbrPag = 20;
        $teams = Team::orderBy('league_id')->whereHas('players', function($query){
            $query->where('activity', '=', 1);
        })->has('players', '>', 0)->paginate($nbrPag);

        if(!Input::get('page')){
            $page = 0;
        } else {
            $page = Input::get('page') * $nbrPag - $nbrPag;
        }
        return view('admin.players.index', compact('teams', 'page'));
    }

    /**
     * Create a player
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        // Get all the countries in a list : 'id' => 'name'
        $countries = Country::all();
        $listCountries = [];
        foreach($countries as $c){
            $listCountries = array_add($listCountries, $c->id, $c->nameCountry);
        }

        // Get all positions in a list : 'id' => 'longName (shortName)'
        $positions = Position::all();
        $listPositions = [];
        foreach($positions as $p){
            $listPositions = array_add($listPositions, $p->id, $p->nameLongPosition.' ('.$p->namePosition.')');
        }

        $teams = Team::all();
        $listTeams = [];
        foreach($teams as $t){
            $listTeams = array_add($listTeams, $t->id, $t->nameLongTeam.' ('.$t->nameTeam.')');
        }

        return view('admin.players.create',
            compact('listCountries', 'listPositions', 'listTeams'));
    }

    /**
     * Store a player
     *
     * @param PlayerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlayerRequest $request){
        $player = $this->savePlayer($request);
        $player->save();

        $player = Player::latest()->first();
        $player->teams()->attach($request->team_id, ['activity' => 1]);
        flash('Le joueur "'.$player['namePlayer'].' '.$player['surNamePlayer'].'" a été ajoutée avec succès')->success();

        return redirect()->action($this->redirectLink);
    }

    /**
     * Edit a player
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $player = Player::newTeam($id)->first();
        $player->team_id = $player->teams->first()->id;
        // Get all the countries in a list : 'id' => 'name'

        $countries = Country::notFind($player->country->id)
                            ->orderBy('nameCountry')
                            ->get();
        $listCountries = [];
        foreach($countries as $c){
            $listCountries = array_add($listCountries, $c->id, $c->nameCountry);
        }
        $listCountries = array_add($listCountries, $player->country->id, $player->country->nameCountry);

        // Get all positions in a list : 'id' => 'longName (shortName)'
        $positions = Position::notFind($player->position->id)
                            ->orderBy('nameLongPosition')
                            ->get();
        $listPositions = [];
        foreach($positions as $p){
            $listPositions = array_add($listPositions, $p->id, $p->nameLongPosition.' ('.$p->namePosition.')');
        }
        $listPositions = array_add($listPositions, $player->position->id, $player->position->nameLongPosition.' ('.$player->position->namePosition.')');

        $teams = Team::notFind($player->teams->first()->id)
                    ->orderBy('nameTeam')
                    ->get();
        $listTeams = [];
        foreach($teams as $t){
            $listTeams = array_add($listTeams, $t->id, $t->getFullNameTeamAttribute());
        }
        $listTeams = array_add($listTeams, $player->teams->first()->id, $player->teams->first()->getFullNameTeamAttribute());

        $oldTeams = Team::oldTeams($id)
                    ->get();

        return view('admin.players.edit',
            compact('listCountries', 'listPositions', 'listTeams', 'player', 'oldTeams'));
    }

    /**
     * Update a player
     *
     * @param $id
     * @param PlayerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, PlayerRequest $request){
        $player = Player::newTeam($id)->first();
        if($request->team_id != $player->teams->first()->id){
            $test = Player::whereHas('teams', function($query) use ($id, $request) {
                $query->where('team_id', '=', $request->team_id)
                    ->where('activity', '=', 0)
                    ->where('player_id', '=', $id);
            })->get();
            if($test->isEmpty()){
                $player->teams()->attach($request->team_id, ['activity' => 1]);
            } else{
                $player->teams()->updateExistingPivot($request->team_id, ['activity' => 1]);
            }

            $player->teams()->updateExistingPivot($player->teams->first()->id, ['activity' => 0]);
        }

        $this->savePlayer($request, $player);
        $player->update();


        flash('Le joueur "'.$request->namePlayer.' '.$request->surNamePlayer.'" a été modifiée avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $player = Player::findOrFail($id);
        $player->teams()->detach();
        $player->delete();
        flash('Le joueur "'.$player['namePlayer'].' '.$player['surNamePlayer'].'" a été supprimée avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Ajax request to get players from a click team
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPlayersByTeam(){
        $team = Input::get('id');
        if(Request::ajax()) {
            // Select players where team = get_id and pivot_team_id = get_id and pivot_activity=1
            $teams = Team::with(['players' => function($query) use ($team){
                $query->wherePivot('team_id' , '=' , $team)
                      ->wherePivot('activity', '=', 1);
            }])->where('id', '=', $team)->get();
            return view('admin.partials.playersAjax', compact('teams'));
        }
    }

    /**
     * Save a player
     *
     * @param PlayerRequest $request
     * @param Player|null $player
     * @return Player
     */
    private function savePlayer(PlayerRequest $request, Player $player = null){
        if($player == null){
            $null = true;
        } else{
            $null = false;
        }
        $r = $request->toArray();
        if($null == true) {
            $player = new Player;
        }

        $player->namePlayer = $r['namePlayer'];
        $player->surNamePlayer = $r['surNamePlayer'];
        $player->birthdayPlayer = $r['birthdayPlayer'];
        $player->contractPlayer = $r['contractPlayer'];
        $player->twitterPlayer = $r['twitterPlayer'];
        $player->instagramPlayer = $r['instagramPlayer'];
        $player->snapchatPlayer = $r['snapchatPlayer'];
        $player->salaryPlayer = $r['salaryPlayer'];
        $player->valuePlayer = $r['valuePlayer'];
        $player->valueVotePlayer = $r['valuePlayer'];
        $player->numberVotePlayer = 1;
        $player->country_id = $r['country_id'];
        $player->position_id = $r['position_id'];
        if($null == true) {
            return $player;
        }
    }
}
