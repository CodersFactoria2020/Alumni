<?php

namespace App\Http\Controllers;

use App\Prueba;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
   
    public function index()
    {
        $pruebas = Prueba::all();
        return view('prueba.index', ['pruebas'=>$pruebas]);
    }


    public function create()
    {
        return view('prueba.create');
    }


    public function store(Request $request)
    {
        Prueba::create($request->all());
        return redirect ('/prueba');
    }


    public function show(Prueba $prueba)
    {
        return view('prueba.show', compact('prueba'));
    }

    public function edit(Prueba $prueba)
    {
        //
    }

    public function update(Request $request, Prueba $prueba)
    {
        //
    }

    public function destroy(Prueba $prueba)
    {
        $prueba->delete();
        return redirect (route('prueba.index'));
    }
}
