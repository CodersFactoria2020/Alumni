<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\Language as LanguageResource;


class Thread extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'user'=>new UserResource($this->user),
            'posts'=>PostResource::collection($this->posts),
            'languages'=>LanguageResource::collection($this->languages),
            'forum_category_id'=>$this->forum_category_id,
            'views'=>$this->views,
            'replies'=>$this->replies,
            'title'=>$this->title,
        ];
    }
}