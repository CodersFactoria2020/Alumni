<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD
Route::post('/botman/conversation', 'BotManController@conversation');
Route::match(['get', 'post'], 'conversation', 'BotManController@handle');













=======
Route::resource('language','LanguageController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> origin/CRUDLanguage
