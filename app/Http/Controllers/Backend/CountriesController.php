<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CountriesController extends Controller
{
    private $redirectLink = 'Backend\CountriesController@index';

    /**
     * Show all the countries add/edit/delete
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $countries = Country::latest('created_at')->paginate(20);
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show a country using the slug as identificator
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug){
        $country = Country::findBySlug($slug);
        // Get de leagues of a country
        $leagues = $country->leagues;
        return view('admin.countries.show', compact('country', 'leagues'));
    }

    /**
     * Create a country
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.countries.create');
    }

    /**
     * Save a country after creating it
     *
     * @param CountryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CountryRequest $request){
        $requestData = $this->imageHandle($request);
        Country::create($requestData);
        flash('Le pays "'.$requestData['nameCountry'].'" a été ajouté avec succès !')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Form edit, return the view
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $country = Country::find($id);
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update a country, handling the image saving
     *
     * @param $id
     * @param CountryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CountryRequest $request){
        $country = Country::find($id);
        $requestData = $this->imageHandle($request, $country->imgCountry);

        // If new image => we delete old flag
        if($country->imgCountry != $requestData['imgCountry']){
            \File::delete(storage_path().'/app/public/'.$country->imgCountry);
        }

        $country->update($requestData);

        flash('Le pays "'.$requestData['nameCountry'].'" a été modifié avec succès !')->success();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Deleting the country with the flag associated to it
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        $country = Country::find($id);
        flash('Le pays "'.$country->nameCountry.'" a été supprimé avec succès !')->success();
        // Delete the image attach to the country that going to be destroy
        \File::delete(storage_path().'/app/public/'.$country->imgCountry);
        $country->delete();
        return redirect()->action($this->redirectLink);
    }

    /**
     * Store an image in a specific path for countries flags
     *
     * @param CountryRequest $request
     * @param null $img
     * @return array
     */
    private function imageHandle(CountryRequest $request, $img = null){
        $requestData = $request->all();
        if ($request->hasFile('imgCountry')) {
            $extension = $request->imgCountry->extension();
            $name = SlugService::createSlug
                (Country::class, 'slugCountry', $request->nameCountry, ['unique' => false])
                .'.'.$extension;
            $request->imgCountry->storeAs('public/logo/countries', $name);
            $requestData['imgCountry'] = 'logo/countries/'.$name;
        } else{
            $requestData['imgCountry'] = $img;
        }
        return $requestData;
    }
}
