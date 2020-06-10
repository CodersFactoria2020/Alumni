<?php

namespace App\Http\Controllers;

use App\Test;
use App\Http\Resources\Test as TestResource;
use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function index()
    {
        return view('test.index');
    }

    public function all()
    {
        $tests = TestResource::collection(Test::all());
        return $tests; 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $test = Test::create($request->all());
        //return back();
        return $test;

    }


    public function show(Test $test)
    {
        //
    }

    public function edit(Test $test)
    {
        //
    }

    public function update(Request $request, Test $test)
    {
        //
    }

    public function destroy(Test $test)
    {
        $test->delete();
        return $test;
    }
}
