<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AbilityRequest;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Silber\Bouncer\Database\Ability;

class AbilitiesController extends BaseController
{
    private $redirectLink = 'Backend\AbilitiesController@index';
    /**
     * Display a listing of Abilities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abilities = Ability::paginate(20);

        return view('admin.abilities.index', compact('abilities'));
    }

    /**
     * Show the form for creating new Ability.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abilities.create');
    }

    /**
     * Store a newly created Ability in storage.
     *
     * @param  \App\Http\Requests\StoreAbilitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbilityRequest $request)
    {
        Ability::create($request->all());

        return redirect()->action($this->redirectLink);
    }


    /**
     * Show the form for editing Ability.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ability = Ability::findOrFail($id);

        return view('admin.abilities.edit', compact('ability'));
    }

    /**
     * Update Ability in storage.
     *
     * @param  \App\Http\Requests\UpdateAbilitiesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbilityRequest $request, $id)
    {
        $ability = Ability::findOrFail($id);
        $ability->update($request->all());

        return redirect()->action($this->redirectLink);
    }


    /**
     * Remove Ability from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ability = Ability::findOrFail($id);
        $ability->delete();

        return redirect()->action($this->redirectLink);
    }
}
