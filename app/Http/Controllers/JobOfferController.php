<?php

namespace App\Http\Controllers;

use App\JobOffer;
use App\Http\Resources\JobOffer as JobOfferResource;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        return view('jobOffer.index');
    }

    public function all()
    {
        $jobOffers = JobOfferResource::collection(JobOffer::all());
        return $jobOffers;
    }

    public function getJobOffer(JobOffer $jobOffer)
    {
        $jobOfferX = New JobOfferResource($jobOffer);
        return $jobOfferX;
    }

    public function store(Request $request)
    {
        $jobOffers = JobOffer::create($request->all());
        return $jobOffers;
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        $jobOffer->update($request->all());
        return $jobOffer;
    }

    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->delete();
        return $jobOffer;
    }
}
