<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/jobOffers','JobOfferController@all');

Route::get('/jobOffers/{jobOffer}','JobOfferController@getJobOffer');

Route::post('/jobOffers','JobOfferController@store');

Route::delete('/jobOffers/{jobOffer}','JobOfferController@destroy');

Route::patch('/jobOffers/{jobOffer}','JobOfferController@update');

Route::get('/empresas','EmpresaController@all');

Route::get('/tags','TagController@all');


Route::get('/projects','ProjectController@all');

Route::get('/projects/{project}','ProjectController@getProject');

Route::post('/projects','ProjectController@store');

Route::delete('/projects/{project}','ProjectController@destroy');

Route::patch('/projects/{project}','ProjectController@update');

