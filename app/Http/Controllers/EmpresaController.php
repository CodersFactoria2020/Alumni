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
        Empresa::create($request->all());
        return redirect ('/empresa/'.$request->empresa_id);
    }


    public function show(empresa $empresa)
    {
        return view('empresa.show', compact('empresa'));
    }


    public function edit(empresa $empresa)
    {
        return view ('empresa.edit', ['empresa'=>$empresa]);
    }


    public function update(Request $request, empresa $empresa)
    {
        $empresa->update($request->all());
        return redirect ('/empresa');
    }


    public function destroy(empresa $empresa)
    {
        $empresa->delete();
        return redirect (route('empresa.index'));
    }
    
    public function all()
    {
        $empresas = EmpresaResource::collection(Empresa::all());
        return $empresas;
    }

}
