<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TransferRequest;
use App\Models\Player;
use App\Models\Team;
use App\Models\Transfer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransfersController extends Controller
{
    private $redirectLink = 'Backend\TransfersController@index';

    /**
     * Show all the transfers
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $transfers = Transfer::with(['teams', 'player'])
                                ->orderBy('created_at', 'desc')
                                ->paginate(20);
        return view('admin.transfers.index', compact('transfers'));
    }

    /**
     * Create a transfer
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $players = Player::with(['teams' => function($query){
            $query->where('activity', '=', 1);
        }])->get();
        $listPlayers = [];
        foreach ($players as $p) {
            $listPlayers = array_add($listPlayers, $p->id, $p->getFullNameAttribute().' ('.$p->teams->first()->nameLongTeam.')');
        }

        $teams = Team::all();
        $listTeams = [];
        foreach ($teams as $t) {
            $listTeams = array_add($listTeams, $t->id, $t->getFullNameTeamAttribute());
        }

        return view('admin.transfers.create', compact('listPlayers', 'listTeams'));
    }

    /**
     * Store a transfer
     *
     * @param TransferRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransferRequest $request){
        $r = $request->toArray();
        $player = Player::newTeam($r['player_id'])->first();

        $transfer = DB::table('transfers')
                        ->join('team_transfer as a', 'a.transfer_id', 'transfers.id')
                        ->join('team_transfer as b', 'b.transfer_id', 'transfers.id')
                        ->where('a.team_id', '=', $player->teams->first()->id)
                        ->where('a.left', '=', 1)
                        ->where('b.team_id', '=', $r['team_id_right'])
                        ->where('b.left', '=', 0)
                        ->where('transfers.player_id', '=', $player->id)
                        ->select('*')->get();
        if($player->teams->first()->id == $r['team_id_right']){
            flash('L\'équipe de départ ne peut pas être la même que celle d\'arrivée')->error();
            return redirect()->action('Backend\TransfersController@create');
        }

        if($transfer->isEmpty()) {
            $send = new Transfer();
            $send->player_id = $r['player_id'];
            if (isset($r['offTransfer'])) {
                $this->saveOfficialTransfer($send, $r, $player);
            } else {
                $send->offTransfer = 0;
                $send->activeTransfer = 1;
                $send->save();
                $send->teams()->attach($player->teams->first()->id, ['left' => 1]);
                $send->teams()->attach($r['team_id_right'], ['left' => 0]);
            }
        } else{
            flash('Cette combinaison existe déjà')->error();
            return redirect()->action('Backend\TransfersController@create');
        }
        flash('Le transfert a été ajouté avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Edit a transfer
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $transfer = Transfer::with('teams')
                                ->where('id', '=', $id)
                                ->first();


        $player = Player::find($transfer->player_id);
        $listPlayers = [];
        $listPlayers = array_add($listPlayers, $player->id, $player->getFullNameAttribute());

        $team = $transfer->getTeamRight();
        $listTeams = [];
        $listTeams = array_add($listTeams, $team->id, $team->getFullNameTeamAttribute());
        $transfer->team_id_right = $team->id;

        return view('admin.transfers.edit', compact('transfer','listPlayers', 'listTeams'));
    }

    /**
     * Update a transfer
     *
     * @param $id
     * @param TransferRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, TransferRequest $request){
        if(isset($request->offTransfer)){
            $r = $request->toArray();
            $transfer = Transfer::find($id);
            $player = Player::find($transfer->player_id);
            $this->saveOfficialTransfer($transfer, $r, $player);
        }

        flash('Le transfert a été modifié avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Delete a transfer
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $transfer = Transfer::find($id);
        $transfer->teams()->detach();
        $transfer->delete();
        flash('Le transfert a été supprimé avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Handle the saving of official transfers
     *
     * @param $send
     * @param $r
     * @param $player
     */
    private function saveOfficialTransfer($send, $r, $player){
        if(isset($send->id)){
            $updating = true;
        } else{
            $updating = false;
        }
        $send->offTransfer = $r['offTransfer'];
        $send->amountTransfer = $r['amountTransfer'];
        $send->linkTransfer = $r['linkTransfer'];
        $send->activeTransfer = 1;
        $send->save();

        if(!$updating) {
            $send->teams()->attach($player->teams->first()->id, ['left' => 1]);
            $send->teams()->attach($r['team_id_right'], ['left' => 0]);
        }
        $transfers = Transfer::where('player_id', '=', $r['player_id'])
                        ->where('id', '!=', $send->id)
                        ->get();
        foreach($transfers as $t){
            $t->activeTransfer = 0;
            $t->update();
        }

        $id = $player->teams->first()->id;
        $player->teams()->updateExistingPivot($id, ['activity' => 0]);
        $player->teams()->attach($r['team_id_right'], ['activity' => 1]);

        if(isset($r['contractPlayer'])){
            $player->contractPlayer = $r['contractPlayer'];
            $player->update();
        }
    }
}
