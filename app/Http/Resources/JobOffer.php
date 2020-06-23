<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Language as LanguageResource;



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
            'languages'=>LanguageResource::collection($this->languages),

        ];
    }
}
