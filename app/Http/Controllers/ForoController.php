<?php

namespace App\Http\Controllers;

use App\Foro;
use Illuminate\Http\Request;

class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('foro.index');
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
     * @param  \App\Foro  $foro
     * @return \Illuminate\Http\Response
     */
    public function show(Foro $foro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foro  $foro
     * @return \Illuminate\Http\Response
     */
    public function edit(Foro $foro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foro  $foro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foro $foro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foro  $foro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foro $foro)
    {
        //
    }
}
