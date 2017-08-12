<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Http\Requests\LeagueRequest;
use App\Models\League;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LeaguesController extends Controller
{
    private $redirectLink = 'Backend\LeaguesController@index';

    /**
     * Index method of leagues
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $leagues = DB::table('leagues')
                        ->leftJoin('countries', 'leagues.country_id', '=', 'countries.id')
                        ->select('leagues.*', 'countries.*', 'leagues.id as id')
                        ->orderBy('countries.nameCountry', 'asc')
                        ->orderBy('leagues.nameLeague', 'asc')
                        ->paginate(2);
        return view('admin.leagues.index', compact('leagues'));
    }

    /**
     * Page for a specific league
     * showing the clubs attach to the league
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug){
        $league = League::findBySlugOrFail($slug);
        $teams = $league->teams;
        return view('admin.leagues.show', compact('league', 'teams'));
    }

    /**
     * Creating a league, selection a country
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $countries = Country::all();
        $list = [];
        foreach ($countries as $c) {
            $list = array_add($list, $c->id, $c->nameCountry);
        }
        return view('admin.leagues.create', compact('list'));
    }

    /**
     * Saving a league into the database
     *
     * @param LeagueRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LeagueRequest $request){
        League::create($request->all());
        flash('La ligue "'.$request->nameLeague.'" a été ajoutée avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Editing a league
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $league = League::findOrFail($id);
        if(!is_null($league->country_id)) {
            $countries = Country::where('id', '!=', $league->country_id)->get();
        } else{
            $countries = Country::all();
        }
        $list = [];

        foreach ($countries as $c) {
            $list = array_add($list, $c->id, $c->nameCountry);
        }

        if(!is_null($league->country_id)) {
            $list = array_add($list, $league->country_id, $league->country->nameCountry);
        }
        return view('admin.leagues.edit', compact('league', 'list'));
    }

    /**
     * Saving an already existing league
     *
     * @param $id
     * @param LeagueRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, LeagueRequest $request){
        $league = League::findOrFail($id);
        $league->update($request->all());
        flash('La ligue "'.$request->nameLeague.'" a été modifiée avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Deleting a league
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $league = League::findOrFail($id);
        flash('La ligue "'.$league->nameLeague.'" a été supprimée avec succès')->success();

        $league->delete();

        return redirect()->action($this->redirectLink);
    }
}
