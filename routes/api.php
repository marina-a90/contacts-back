<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// header('Access-Control-Allow-Origin: *');
// // dozvoljavam bilo koji origin 
// header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// // dozvoljavam ove requestove
// ovo je bilo privremeno resenje - sad sa laravel-cors paketom je reseno sve

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('contacts', 'ContactsController@index');
// automatski doda prefiks api
// ruta je /localhost/api/contacts
//mogu da koristim i resource controller
Route::resource('contacts', 'ContactsController')->middleware('auth:api');

Route::group([
    'middleware' => 'api',      // definisali smo da je auth api, zato su sve u grupi auth
    'prefix' => 'auth'        // za login: api/auth/login - prefix
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');     // logout ne mora da se radi na backu, al trebalo bi
                                                        // cuva front na local storage
                                                        // kad izlogujemo, obrisemo token
                                                        // request da back odradi logout tako sto ponisti token
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});