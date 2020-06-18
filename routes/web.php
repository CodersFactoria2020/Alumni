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

Route::get('painel', function () {
    return view('painel');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::resource('perfiles','PerfilesController');

Route::resource('ofertas','OfertasController');

Route::resource('empresas','EmpresasController');

Route::resource('foro','ForoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/botman/conversation', 'BotManController@conversation');
Route::match(['get', 'post'], 'conversation', 'BotManController@handle');

Route::resource('language','LanguageController');
Route::resource('category', 'CategoryController');
Route::get('/busca', 'CategoryController@busca');


