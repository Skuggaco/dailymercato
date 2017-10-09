<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Routes for the front side
 */

Route::get('/', 'Frontend\MainController@index');
Route::get('/joueur/{slug}', 'Frontend\PlayersController@index');
Route::get('/club/{slug}', 'Frontend\TeamsController@index');

/**
 * Routes for the tabs
 */

Route::get('/transferts-plus-chauds/{league?}', 'Frontend\TabsController@hottestTab');
Route::get('/classement-des-plus-gros-transferts/{league?}', 'Frontend\TabsController@officialRankTab');

/**
 * Routes for the votes
 */

Route::get('/voter', 'Frontend\AjaxController@votingRumours');

/**
 * Routes for the admin panel
 */

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Backend'], function(){
    Route::get('/', 'DashBoardController@index');
    Route::resource('pays', 'CountriesController');
    Route::resource('ligues', 'LeaguesController');
    Route::get('equipes/charger', 'TeamsController@getTeamsByLeague');
    Route::resource('equipes', 'TeamsController');
    Route::resource('postes', 'PositionsController');
    Route::get('joueurs/charger', 'PlayersController@getPlayersByTeam');
    Route::resource('joueurs', 'PlayersController');
    Route::get('ancienne-equipe/create/{id}', 'TeamPlayerController@create');
    Route::post('ancienne-equipe/store/{id}', 'TeamPlayerController@store');
    Route::delete('ancienne-equipe/{team_id}/{player_id}', 'TeamPlayerController@destroy');
    Route::resource('transferts', 'TransfersController');
    Route::resource('sessions', 'SessionsController');
    Route::resource('aptitudes', 'AbilitiesController');
});


/**
 * Routes for the authentification
 */

Auth::routes();

