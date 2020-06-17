<?php

namespace App\Http\Controllers;

use App\JobOffer;
use App\Tag;
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
        return New JobOfferResource($jobOffer);
    }

    public function store(Request $request)
    {
        $jobOffers = JobOffer::create($request->all());

        $collection = Tag::hydrate($request->tags);

        foreach($collection as $tag) {
            $jobOffers->tags()->attach($tag->id);
        }

        return $jobOffers;
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        $jobOffer->update($request->all());

        $jobOffer->tags()->detach();

        $collection = Tag::hydrate($request->tags);

        foreach($collection as $tag) {
            $jobOffer->tags()->attach($tag->id);
        }


        return $jobOffer;
    }

    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->tags()->detach();
        $jobOffer->delete();
        return $jobOffer;
    }
}
