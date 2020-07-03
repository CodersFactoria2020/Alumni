<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jobOffers','JobOfferController@all');

Route::get('/jobOffers/{jobOffer}','JobOfferController@getJobOffer');

Route::post('/jobOffers','JobOfferController@store');

Route::delete('/jobOffers/{jobOffer}','JobOfferController@destroy');

Route::patch('/jobOffers/{jobOffer}','JobOfferController@update');

Route::get('/empresas','EmpresaController@all');

Route::get('/languages','LanguageController@all');


Route::get('/projects','ProjectController@all');

Route::get('/projects/{project}','ProjectController@getProject');

Route::post('/projects','ProjectController@store');

Route::delete('/projects/{project}','ProjectController@destroy');

Route::patch('/projects/{project}','ProjectController@update');


Route::get('/empresas','EmpresaController@all');

Route::get('/tags','TagController@all');
Route::get('/forumCategories','ForumCategoryController@getForumCategories');
Route::get('/forumCategory/{forumCategory}','ForumCategoryController@getForumCategory');
Route::get('/threads/latestfourupdatedthreads','ThreadController@getLatestFourUpdatedThreadsInForumCategory');
Route::get('/threads','ThreadController@getAllThreads');
Route::get('/threads/{thread}','ThreadController@getThread');
Route::post('/threads','ThreadController@store');
Route::patch('/threads/{thread}','ThreadController@update');
Route::delete('/threads/{thread}','ThreadController@destroy');

Route::get('/posts','PostController@getAllPosts');
Route::get('/posts/{post}','PostController@getPost');
Route::post('/posts','PostController@store');
Route::patch('/posts/{post}','PostController@update');
Route::delete('/posts/{post}','PostController@destroy');
