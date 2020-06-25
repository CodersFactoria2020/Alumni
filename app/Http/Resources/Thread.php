<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag as TagResource;

class Thread extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'forum_category_id'=>$this->forum_category_id,
            'views'=>$this->views,
            'replies'=>$this->replies,
            'title'=>$this->title,
            //'tags'=>TagResource::collection($this->tags)
        ];
    }
}