<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag as TagResource;



class JobOffer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'position'=>$this->position,
            'empresa'=>$this->empresa,
            'location'=>$this->location,
            'description'=>$this->description,
            'tags'=>TagResource::collection($this->tags),

        ];
    }
}
