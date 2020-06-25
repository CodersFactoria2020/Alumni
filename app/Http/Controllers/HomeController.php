<?php

namespace App\Http\Controllers;
use App\User;
use App\Event;
use App\Profile;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __construct()
    {
/*         $this->middleware('auth'); estoy haciendo un tutorial para subir docs y dice q lo quite
 */    }

    public function index()
    {
        $profile=Profile::all();
        $events=Event::all();
        return view('home', compact(['profile','events']));

    }
}
