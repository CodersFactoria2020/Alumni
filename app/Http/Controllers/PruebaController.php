<?php

namespace App\Http\Controllers;

use App\Prueba;
use App\Empresa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Routing\ResponseFactory;

class PruebaController extends Controller
{

    public function index()
    {
        $pruebas = Prueba::all();
        return view('prueba.index', compact ('pruebas'));
    }


    public function create(Request $request)
    {
        return view('prueba.create', compact('request'));
    }

    public function store(Request $request, Prueba $prueba)
    {
        $this->validate($request, [
            'document' => 'file|max:9920000'
        ]);

        $prueba = Prueba::create([
            'title' => $request->title,
            'description' => $request->description,
            'empresa_id' => $request->empresa_id,
        ]);
        if(isset($prueba['document']) ) {
            $upload = $request->file('document');
            $document = $upload->storeAs('/pruebas/', $prueba->id . '.pdf');
        }
            return redirect('/prueba/' . $prueba->id);

    }

    public function download(Request $request,Prueba $prueba)
    {
        return Storage::download('/pruebas/'.$prueba->id.'.pdf', $prueba->title.'.pdf');
    }

    public function show(Request $request, Prueba $prueba)
    {
        return view('prueba.show', compact('prueba'));
    }

    public function edit(Prueba $prueba)
    {
        return view('prueba.edit', compact('prueba'));
    }

    public function update(Request $request, Prueba $prueba)
    {
        $prueba->update($request->all());
        return redirect ('/prueba/'.$prueba->id);
    }

    public function destroy(Prueba $prueba, Empresa $empresa)
    {
        $prueba->delete();
        return redirect ('/empresa/'.$empresa->id);
    }

}
