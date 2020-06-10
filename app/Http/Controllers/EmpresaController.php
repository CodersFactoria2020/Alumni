<?php

namespace App\Http\Controllers;

use App\empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', ['empresas'=>$empresas]);
    }


    public function create()
    {
        return view('empresa.create');
    }


    public function store(Request $request)
    {
        Empresa::create($request->all());
            return redirect ('/empresa');
    }


    public function show(empresa $empresa)
    {
        //return view('empresa.sow')
    }


    public function edit(empresa $empresa)
    {
        //
    }


    public function update(Request $request, empresa $empresa)
    {
        //
    }


    public function destroy(empresa $empresa)
    {
        //
    }
}
