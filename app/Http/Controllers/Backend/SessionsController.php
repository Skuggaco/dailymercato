<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SessionRequest;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function index(){
        $sessions = Session::orderBy('on_going')->paginate(20);
        return view('admin.sessions.index', compact('sessions'));
    }

    public function show($slug){

    }

    public function create(){

    }

    public function store(SessionRequest $request){

    }

    public function edit($id){

    }

    public function update($id, SessionRequest $request){

    }

    public function destroy($id){
        $session = Session::find($id);
        $session->delete();
    }
}
