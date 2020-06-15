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
        $this->middleware('auth');
    }

    public function index()
    {
        $profile=Profile::all();
        $events=Event::all();
        return view('home', compact(['profile','events']));
    }
}
