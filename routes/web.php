<?php
use App\Role;
use App\User;
use App\Permission;
use App\Event;
use Illuminate\Support\Facades\Gate;
use App\Auth\Middleware\CheckAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['checkaccess'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin')->middleware('checkadmin');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/role', 'RoleController')->names('role');
    Route::resource('/user', 'UserController',['except'=>['create', 'store']])->names('user');
    Route::resource('/profile', 'ProfileController')->names('profile');
    Route::resource('/event', 'EventController')->names('event');
    Route::get('/asist/{event_id}/{profile_id}', 'EventController@asist')->name('event.asist');
    Route::get('/asistance', 'ProfileController@assistance')->name('profile.assistance');
});

Auth::routes();
Route::view('/warning', 'warning')->name('warning');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/jobOffers', 'JobOfferController@index')->name('jobOffers.index');
Route::get('/faq', 'FaqController@index')->name('faq.index');
Route::get('/foro', 'ForumCategoryController@index')->name('foro.index');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/botman', 'BotManController@botman');

Route::resource('language','LanguageController');
Route::resource('category', 'CategoryController');
Route::get('/busca', 'CategoryController@busca');

Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('/empresas', 'EmpresaController@index')->name('empresas.index');

Route::resource('/empresa', 'EmpresaController');

Route::resource('/prueba', 'PruebaController');

Route::resource('/review', 'ReviewController');