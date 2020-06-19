<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo('App\Forum', 'forum_id');
    }

    public function posts()
    {
        return $this->belongsTo('App\Post', 'thread_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_thread');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_thread');
    }
}