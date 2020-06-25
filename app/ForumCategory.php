<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'forum_categories';
    
    public function threads()
    {
        return $this->hasMany(Thread::class, 'forum_category_id');
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'forum_category_tag');
    }
}