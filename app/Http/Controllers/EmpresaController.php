<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\Empresa as EmpresaResource;

class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', compact ('empresas'));
    }


    public function create(Request $request)
    {
        return view('empresa.create', compact('request'));
    }


    public function store(Request $request)
    {
        $empresa = Empresa::create($request->all());
        return redirect ('/empresa/'.$empresa->id);
    }


    public function show(Empresa $empresa)
    {
        return view('empresa.show', compact('empresa'));
    }


    public function edit(Empresa $empresa)
    {
        return view ('empresa.edit', ['empresa'=>$empresa]);
    }


    public function update(Request $request, Empresa $empresa)
    {
        $empresa->update($request->all());
        return view ('empresa.show', compact('empresa'));
    }


    public function destroy(Empresa $empresa)
    {
        $empresa->reviews()->delete();
        $empresa->pruebas()->delete();
        $empresa->delete();

        return redirect (route('empresa.index'));
    }
    
    public function all()
    {
        $empresas = EmpresaResource::collection(Empresa::all());
        return $empresas;
    }

}
