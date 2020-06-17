<?php

namespace App\Http\Controllers;

use App\Empresa;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(Request $request)
    {
        $reviews = Review::where('empresa_id', $request->empresa)->get();
        return view('review.index', compact ('reviews'));
    }

    public function create(Request $request)
    {
        return view('review.create', compact('request'));
    }


    public function store(Request $request)
    {
        Review::create($request->all());
        return redirect ('/review/'.$request->empresa_id);    
    }

    public function show(Review $review)
    {
        return view('review.show', compact('review'));
    }

    public function edit(Review $review)
    {
        //
    }

    public function update(Request $request, Review $review)
    {
        //
    }

    public function destroy(Review $review)
    {
        //
    }
}
