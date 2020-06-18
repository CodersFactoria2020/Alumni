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
    })->middleware('checkadmin');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/role', 'RoleController')->names('role');
    Route::resource('/user', 'UserController',['except'=>['create', 'store']])->names('user');
    Route::resource('/profile', 'ProfileController')->names('profile');
    Route::resource('/event', 'EventController')->names('event');
    Route::get('/asist/{event_id}/{profile_id}', 'EventController@asist')->name('event.asist');
    Route::get('/asistance', 'ProfileController@assistance')->name('profile.assistance');
});

Route::resource('ofertas','OfertasController');
Route::resource('empresas','EmpresasController');
Route::resource('foro','ForoController');

Auth::routes();
Route::view('/warning', 'warning')->name('warning');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

