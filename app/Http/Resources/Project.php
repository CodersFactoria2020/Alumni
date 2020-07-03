<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Language as LanguageResource;

class Project extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'repository'=>$this->repository,
            'status'=>$this->status,
            'username'=>$this->username,
            'email'=>$this->email,
            'languages'=>LanguageResource::collection($this->languages),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
