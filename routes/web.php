<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;



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

//11junio
Route::get('/test', function () {

    //---------Section manual asignar user a rol ----

    //$user = User::find(4); //3 id user
    //$user->roles()->sync([3]); //2 id del rol 
    //return $user->roles;
    //return $user

    //---------End Section manual asignar user a rol ----

    $user = User::find(4);
    //return $user->havePermission('role.create'); //tenemos que crear el metodo havePermission en User.php
    //Gate::authorize('haveaccess', true); 
    //Gate::authorize('haveaccess', false);
    //Gate::authorize('haveaccess','role.index');
    Gate::authorize('haveaccess','role.show');
    return $user;

});
//End 11 junion 

Route::resource('/role', 'RoleController')->names('role');

//usamos el except y esto hace que no se genere las rutas de create o store para user
Route::resource('/user', 'UserController', ['except'=>['create','store']])->names('user');



//Esto es para crear las Pruebas sin controladores inicialmente
/*Route::get('/test', function () 
{
    */
    //Creamos una pruebita
    //return 'Hola!';
    //vamos a http://127.0.0.1:8000/test y deberia retornar Hola! 

    //Ahora si creamos 3 Roles
    /*
    return  Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => 'Administrator',
        'full-access' => 'yes'
    ]);
    */
    
    /*
    return   Role::create([
        'name' => 'Guest',
        'slug' => 'guest',
        'description' => 'guest',
        'full-access' => 'no'
    ]);
    */
   
    /*
    return   Role::create([
        'name' => 'test',
        'slug' => 'test',
        'description' => 'test',
        'full-access' => 'no'
    ]);
    */
    /*
    $user = User::find(1);

    //$user->roles()->attach([1,3]);
    //$user->roles()->detach([3]); 
    //sync es algo nuevo de Laravel 7 que soluciona de usar attach y detach
    $user->roles()->sync([1,2]);

    return $user->roles;

    */

    /*
    return   Permission::create([
        'name' => 'List product',
        'slug' => 'product.index',  //nombre del modelo y luego nombre del metodo que va a estar asociado en el 
        'description' => 'A user can list permissions',
        
    ]);
    */
    /*
    $role = Role::find(2);

    //$role->permissions()->sync([1]);
    $role->permissions()->sync([1,5]);
    return $role->permissions;
    */
/*    
});
*/
