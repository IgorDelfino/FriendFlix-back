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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listaUsers', 'UserController@listUser'); //nome que quero dar - nome da controller@nome do método
Route::get('mostrarUser/{id}', 'UserController@showUser');
Route::post('criaUser', 'UserController@createUser');
Route::put('atualizaUser/{id}', 'UserController@updateUser');
Route::delete('deletaUser/{id}', 'UserController@deleteUser');
