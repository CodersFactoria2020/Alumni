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
Route::resource('/role', 'RoleController')->names('role');
Route::resource('/user', 'UserController',['except'=>['create', 'store']])->names('user');
Route::resource('/profile', 'ProfileController')->names('profile');
Route::resource('/event', 'EventController')->names('event');
Route::get('/asist/{event_id}/{profile_id}', 'EventController@asist')->name('event.asist');
<<<<<<< HEAD
<<<<<<< HEAD
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/asistance', 'ProfileController@assistance')->name('profile.assistance');
>>>>>>> develop
=======
Route::get('/asistance', 'ProfileController@assistance')->name('profile.assistance');

>>>>>>> 2886b94e175c213321d1ee346d985a3373432b15
