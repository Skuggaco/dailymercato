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

Route::get('/', function () {
    return view('welcome');
});

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
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
