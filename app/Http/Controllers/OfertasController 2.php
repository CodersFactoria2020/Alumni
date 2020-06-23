<?php

namespace App\Http\Controllers;

use App\Ofertas;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ofertas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function show(Ofertas $ofertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ofertas $ofertas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ofertas $ofertas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ofertas $ofertas)
    {
        //
    }
}
