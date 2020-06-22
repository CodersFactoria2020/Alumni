<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'fora';
    
    public function forumCategory()
    {
        return $this->belongsTo('App\ForumCategory', 'forum_category_id');
    }

    public function threads()
    {
        return $this->hasMany('App\Thread', 'forum_id', 'id');
    }
}