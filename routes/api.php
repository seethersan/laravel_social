<?php

use Illuminate\Http\Request;
use ucsp\Persona;
use ucsp\Pais;
use ucsp\Amistad;

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

Route::prefix('persona')->group(function (){
    Route::post('/', 'Api\PersonaApiController@post');
    Route::middleware('auth:api')->group(function () {
        Route::get('/', 'Api\PersonaApiController@get');
        Route::get('/{persona}', 'Api\PersonaApiController@find');
        Route::put('/{persona}', 'Api\PersonaApiController@put');
        Route::delete('/{persona}', 'Api\PersonaApiController@delete');
    });
});

Route::prefix('pais')->group(function (){
    Route::get('/', function (){
        return Pais::all();
    });
    Route::get('/{id}', function($id) {
        return Pais::find($id);
    });
});

