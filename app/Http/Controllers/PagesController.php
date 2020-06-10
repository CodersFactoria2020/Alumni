<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function perfiles()
    {
        return view('perfiles');
    }

    public function ofertas()
    {
        return view('ofertas');
    }

    public function empresas()
    {
        return view('empresas');
    }

    public function foro()
    {
        return view('foro');
    }
}
