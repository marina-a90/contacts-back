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

header('Access-Control-Allow-Origin: *');
// dozvoljavam bilo koji origin 
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// dozvoljavam ove requestove

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('contacts', 'ContactsController@index');
// automatski doda prefiks api
// ruta je /localhost/api/contacts
//mogu da koristim i resource controller
Route::resource('contacts', 'ContactsController');