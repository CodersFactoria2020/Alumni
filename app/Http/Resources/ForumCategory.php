<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Thread as ThreadResource;

class ForumCategory extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'threads'=>ThreadResource::collection($this->threads),
        ];
    }
}