<?php
use App\Role;
use App\User;
use App\Permission;
use App\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::middleware(['checkacces'=>'auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
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
