<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobOffer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'position'=>$this->position,
            'empresa'=>$this->empresa,
            'location'=>$this->location,
            'description'=>$this->description
        ];
    }
}
