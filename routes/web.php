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

Route::resource('/role', 'RoleController')->names('role');
Route::resource('/user', 'UserController',['except'=>['create', 'store']])->names('user');
Route::resource('/profile', 'ProfileController')->names('profile');
Route::resource('/event', 'EventController')->names('event');
Route::get('/asist/{event_id}/{profile_id}', 'EventController@asist')->name('event.asist');
Route::get('/asistance', 'ProfileController@assistance')->name('profile.assistance');
Route::get('/jobOffers', 'JobOfferController@index')->name('jobOffers.index');
Route::get('/empresas', 'EmpresaController@index')->name('empresas.index');
Route::resource('empresa', 'EmpresaController');
Route::get('/faq', 'FaqController@index')->name('faq.index');
Route::get('/foro', 'ForumCategoryController@getForumCategories')->name('foro.index');

Route::post('/botman/conversation', 'BotManController@conversation');
Route::match(['get', 'post'], 'conversation', 'BotManController@handle');

Route::resource('language','LanguageController');
Route::resource('category', 'CategoryController');
Route::get('/busca', 'CategoryController@busca');

Route::get('/projects', 'ProjectController@index')->name('project.index');