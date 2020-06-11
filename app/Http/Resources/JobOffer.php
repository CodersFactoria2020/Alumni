<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobOffer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'position'=>$this->position,
            'company_id'=>$this->company_id,
            'location'=>$this->location,
            'description'=>$this->description
        ];
    }
}
