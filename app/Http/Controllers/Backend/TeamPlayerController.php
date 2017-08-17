<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TeamPlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamPlayerController extends Controller
{
    private $redirectLink = 'Backend\PlayersController@edit';

    /**
     * Create an old team for a player
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id){
        $player = Player::with('teams')->where('id', '=', $id)->first();

        $teams = Team::orderBy('nameTeam');
        foreach ($player->teams as $v){
            $teams->notFind($v->id);
        }
        $listTeams = [];
        foreach($teams->get() as $t){
            $listTeams = array_add($listTeams, $t->id, $t->getFullNameTeamAttribute());
        }

        return view('admin.team_player.create', compact('player', 'listTeams'));
    }

    /**
     * Store an old team to a player
     *
     * @param TeamPlayerRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamPlayerRequest $request, $id){
        $player = Player::find($id);
        $player->teams()->attach($request->team_id, ['activity' => 0]);
        $team = Team::find($request->team_id);
        flash('L\'équipe "'.$team->getFullNameTeamAttribute().'" 
        a bien été ajouté aux anciennes équipes du joueur "'.$player->getFullNameAttribute().'"')->success();
        return redirect()->action($this->redirectLink, ['joueur' => $id]);
    }

    /**
     * Delete an old team from a player
     *
     * @param $team_id
     * @param $player_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($team_id, $player_id){
        $player = Player::with(['teams' => function($query) use ($player_id, $team_id) {
            $query->where('team_id', '=', $team_id)
                  ->where('player_id', '=', $player_id)
                  ->where('activity', '=', 0);
        }])->where('id','=', $player_id)->first();
        $team = Team::find($team_id);
        flash('L\'équipe "'.$team->getFullNameTeamAttribute().'" 
        a bien été supprimé des anciennes équipes du joueur "'.$player->getFullNameAttribute().'"')
            ->success();
        $player->teams()->detach($team_id);
        return redirect()->action($this->redirectLink, ['joueur' => $player_id]);
    }
}
