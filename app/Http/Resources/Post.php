<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;


class Post extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'user'=>new UserResource($this->user),
            'thread_id'=>$this->thread_id,
            'body'=>$this->body
        ];
    }
}