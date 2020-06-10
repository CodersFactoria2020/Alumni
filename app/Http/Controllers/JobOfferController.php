<?php

namespace App\Http\Controllers;

use App\JobOffer;
use App\Http\Resources\JobOffer as JobOfferResource;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobOffer.index');
    }

    public function all()
    {
        $jobOffers = JobOfferResource::collection(JobOffer::all());
        return $jobOffers; 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $jobOffers = JobOffer::create($request->all());
        return $jobOffers;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function show(JobOffer $jobOffer)
    {
        //
    }

    public function edit(JobOffer $jobOffer)
    {
        //
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        //
    }

    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->delete();
        return $jobOffer;
    }
}
