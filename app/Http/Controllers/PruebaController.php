<?php

namespace App\Http\Controllers;

use App\Prueba;
use App\Empresa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; /* no se si es necesario para descargar docs */


class PruebaController extends Controller
{
   
    public function index()
    {
        $pruebas = Prueba::all(); /* ::orderBy('created at', 'DESC')->paginate(30); */
        return view('prueba.index', compact ('pruebas'));
    }


    public function create(Request $request)
    {   

        return view('prueba.create', compact('request')); 
    }


    public function store(Request $request) 
    {
        Prueba::create($request->all());
        return redirect ('/empresa/'.$request->empresa_id); /* new */
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
