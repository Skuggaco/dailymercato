<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SessionRequest;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    private $redirectLink = 'Backend\SessionsController@index';

    public function index(){
        $sessions = Session::orderBy('on_going', 'desc')
                                ->orderBy('start_at', 'desc')
                                ->paginate(20);
        return view('admin.sessions.index', compact('sessions'));
    }

    public function show($slug){

    }

    public function create(){
        $listYears = $this->listYears();
        return view('admin.sessions.create', compact('listYears'));
    }

    public function store(SessionRequest $request){
        $session = new Session;
        $session = $this->saveSession($request, $session);
        $session->save();
        flash('La session "'.$session->nameSession.'" a été ajoutée avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    public function edit($id){
        $session = Session::find($id);
        $listYears = $this->listYears();
        $session->yearSession = $session->start_at->year;
        if($session->start_at->month == '01'){
            $session->dateSession = 'winter';
        } else{
            $session->dateSession = 'summer';
        }
        return view('admin.sessions.edit', compact('session', 'listYears'));
    }

    public function update($id, SessionRequest $request){
        $session = Session::find($id);
        $session = $this->saveSession($request, $session);
        $session->update();
        flash('La session "'.$session->nameSession.'" a été modifiée avec succès')->success();
        return redirect()->action($this->redirectLink);
    }

    public function destroy($id){
        $session = Session::find($id);
        flash('La session "'.$session->nameSession.'" a été supprimée avec succès')->success();
        $session->delete();
        return redirect()->action($this->redirectLink);
    }

    private function listYears(){
        $listYears = [];
        $year = date('Y');
        for ($i = $year ; $i >= 1950 ; $i--){
            $listYears = array_add($listYears, $i, $i);
        }
        return $listYears;
    }

    private function saveSession($request, $session){
        if($request->dateSession == 'winter'){
            $session->start_at = $request->yearSession."-01-01 00:00:00";
            $session->end_at = $request->yearSession."-01-31 23:59:59";
        } else{
            $session->start_at = $request->yearSession."-06-09 00:00:00";
            $session->end_at = $request->yearSession."-08-31 23:59:59";
        }
        $session->nameSession = $request->nameSession;
        if(isset($request->on_going)) {
            $sessionOnGoing = Session::where('on_going', '=', 1)
                                        ->where('id', '!=', $session->id)
                                        ->get();
            if($sessionOnGoing->isNotEmpty()){
                $sessionOnGoing->first()->on_going = 0;
                $sessionOnGoing->first()->update();
            }
            $session->on_going = $request->on_going;
        } else{
            $session->on_going = 0;
        }
        return $session;
    }
}
