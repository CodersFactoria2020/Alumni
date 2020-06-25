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

Route::get('estilos', function () {
    return view('estilos');
});

Route::middleware(['checkaccess'])->group(function () {

    Route::get('/admin', function () {
        return view('admin');
    })->name('admin')->middleware('checkadmin');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/listevents', function () {
        $events=Event::all();
        return view('listevents', compact ('events'));
    })->name('listevents');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/index', 'HomeController@home')->name('index');
    Route::resource('/role', 'RoleController')->names('role');
    Route::resource('/user', 'UserController',['except'=>['create', 'store']])->names('user');
    Route::resource('/profile', 'ProfileController')->names('profile');
    Route::resource('/event', 'EventController')->names('event');
    Route::get('/asist/{event_id}/{profile_id}', 'EventController@asist')->name('event.asist');
    Route::get('/asistance', 'ProfileController@assistance')->name('profile.assistance');
    Route::get('/empleos', 'JobOfferController@index')->name('jobOffers.index');
    Route::get('/proyectos', 'ProjectController@index')->name('projects.index');
    Route::get('/empleos/{jobOffer}', 'JobOfferController@showJobOffer')->name('jobOffers.showJobOffer');
    Route::get('/proyectos/{project}', 'ProjectController@showProject')->name('projects.showProject');

});
//Auth, warning y logout tiene que ir fuera!
Auth::routes();
Route::view('/warning', 'warning')->name('warning');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
//A partir de aquí, todas las rutas las podeis meter en el middelware si quereis, contactadme si necesitais mas info, Acho.

Route::get('/faq', 'FaqController@index')->name('faq.index');
Route::get('/foro', 'ForumCategoryController@index')->name('foro.index');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/botman', 'BotManController@botman');

Route::resource('language','LanguageController');
Route::resource('category', 'CategoryController');
Route::get('/busca', 'CategoryController@busca');

Route::get('/empresas', 'EmpresaController@index')->name('empresas.index');

Route::resource('empresa', 'EmpresaController');

Route::resource('/prueba', 'PruebaController');

Route::resource('/review', 'ReviewController');
