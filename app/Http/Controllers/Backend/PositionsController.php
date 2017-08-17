<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Http\Controllers\Controller;

class PositionsController extends Controller
{
    private $redirectLink = 'Backend\PositionsController@index';

    /**
     * Show all the positions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $positions = Position::paginate(20);
        return view('admin.positions.index', compact('positions'));
    }

    /**
     * Create a position
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.positions.create');
    }

    /**
     * Store a position
     *
     * @param PositionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PositionRequest $request){
        Position::create($request->all());
        flash('Le poste "'.$request->nameLongPosition.'" a été ajouté avec succès !')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Edit a position
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $position = Position::findOrFail($id);
        return view('admin.positions.edit', compact('position'));
    }

    /**
     * Update a position
     *
     * @param $id
     * @param PositionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, PositionRequest $request){
        $position = Position::findOrFail($id);
        $position->update($request->all());
        flash('Le poste "'.$request->nameLongPosition.'" a été modifié avec succès !')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Delete a position
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $position = Position::findOrFail($id);
        flash('Le poste "'.$position->nameLongPosition.'" a été supprimé avec succès !')->success();
        $position->delete();

        return redirect()->action($this->redirectLink);
    }
}
