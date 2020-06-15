<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/empresa', 'EmpresaController');

Route::resource('/prueba', 'PruebaController');

Route::resource('/review', 'ReviewController');
 

Route::post('/prueba/{id}/upload', 'PruebaController@store')->name('upload');
Route::get('/prueba/{id}/download','PruebaController@show')->name('download');








