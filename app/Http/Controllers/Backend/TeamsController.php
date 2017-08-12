<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TeamRequest;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class TeamsController extends Controller
{
    private $redirectLink = 'Backend\TeamsController@index';

    /**
     * Show all leagues
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $leagues = League::paginate(20);
        return view('admin.teams.index', compact('leagues'));
    }

    /**
     * Show a single team, and a list of its players
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug){
        $team = Team::findBySlugOrFail($slug);
        $players = Player::whereHas('teams', function($query) use ($team) {
            $query->where('team_id', '=', $team->id)
                  ->where('activity', '=', 1);
        })->get();
        return view('admin.teams.show', compact('team', 'players'));
    }

    /**
     * Create a team
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $leagues = League::all();
        $list = [];
        foreach ($leagues as $l) {
            $list = array_add($list, $l->id, $l->nameLeague);
        }

        return view('admin.teams.create', compact('list'));
    }

    /**
     * Store a team
     *
     * @param TeamRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamRequest $request){
        $requestData = $this->imageHandle($request);
        Team::create($requestData);
        flash('L\'équipe "'.$requestData['nameLongTeam'].'" a été ajoutée avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Edit a team
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $team = Team::findOrFail($id);
        $leagues = League::where('id', '!=', $team->league_id)->get();
        $list = [];
        foreach ($leagues as $l) {
            $list = array_add($list, $l->id, $l->nameLeague);
        }
        $list = array_add($list, $team->league_id, $team->league->nameLeague);

        return view('admin.teams.edit', compact('team', 'list'));
    }

    /**
     * Update a player
     *
     * @param $id
     * @param TeamRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, TeamRequest $request){
        $team = Team::find($id);
        $requestData = $this->imageHandle($request, $team->imgTeam);

        // If new image => we delete old logo
        if($team->imgTeam != $requestData['imgTeam']){
            \File::delete(storage_path().'/app/public/'.$team->imgTeam);
        }

        $team->update($requestData);
        flash('L\'équipe "'.$requestData['nameLongTeam'].'" a été modifiée avec succès')->success();

        return redirect()->action($this->redirectLink);
    }

    /**
     * Delete a player
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $team = Team::find($id);
        flash('L\'équipe "'.$team['nameLongTeam'].'" a été supprimée avec succès')->success();

        // Delete the image attach to the club that going to be destroy
        \File::delete(storage_path().'/app/public/'.$team->imgTeam);
        $team->delete();

        return redirect()->action($this->redirectLink);
    }

    /**
     * Ajax request, to get the teams from a click league
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTeamsByLeague(){
        $league = Input::get('id');
        if(Request::ajax()) {
            $l = League::find($league);
            $teams = Team::where('league_id', '=', $league)->get();
            return view('admin.partials.teamsAjax', compact('teams', 'l'));
        }
    }

    /**
     * Handle the way image are saved
     *
     * @param TeamRequest $request
     * @param null $img
     * @return array
     */
    private function imageHandle(TeamRequest $request, $img = null){
        $requestData = $request->all();
        if ($request->hasFile('imgTeam')) {
            $extension = $request->imgTeam->extension();
            $name = SlugService::createSlug
                (Team::class, 'slugTeam', $request->nameLongTeam, ['unique' => false])
                .'.'.$extension;
            $request->imgTeam->storeAs('public/logo/teams', $name);
            $requestData['imgTeam'] = 'logo/teams/'.$name;
        } else{
            $requestData['imgTeam'] = $img;
        }
        return $requestData;
    }
}
