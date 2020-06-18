<?php
use App\Role;
use App\User;
use App\Permission;
use App\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::get('painel', function () {
    return view('painel');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD
Route::resource('/role', 'RoleController')->names('role');
Route::resource('/user', 'UserController',['except'=>['create', 'store']])->names('user');
Route::resource('/profile', 'ProfileController')->names('profile');
Route::resource('/event', 'EventController')->names('event');
Route::get('/asist/{event_id}/{profile_id}', 'EventController@asist')->name('event.asist');
Route::get('/asistance', 'ProfileController@assistance')->name('profile.assistance');
Route::get('/jobOffers', 'JobOfferController@index')->name('jobOffer.index');
=======

Route::resource('perfiles','PerfilesController');

Route::resource('ofertas','OfertasController');

Route::resource('empresas','EmpresasController');

Route::resource('foro','ForoController');




Route::post('/botman/conversation', 'BotManController@conversation');
Route::match(['get', 'post'], 'conversation', 'BotManController@handle');

Route::resource('language','LanguageController');
Route::resource('category', 'CategoryController');
Route::get('/busca', 'CategoryController@busca');



>>>>>>> Frontend
