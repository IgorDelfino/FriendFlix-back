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
//user
Route::post('createUser', 'UserController@createUser');
Route::get('listUser','UserController@listUser');
Route::get('showUser/{id}','UserController@showUser');
Route::put('updateUser/{id}','UserController@updateUser');
Route::delete('deleteUser/{id}','UserController@deleteUser');


//series
Route::post('createSerie', 'SerieController@createSerie');
Route::get('listSeries','SerieController@listSerie');
Route::get('showSerie/{id}','SerieController@showSerie');
Route::put('updateSerie/{id}','SerieController@updateSerie');
Route::delete('deleteSerie/{id}','SerieController@deleteSerie');
