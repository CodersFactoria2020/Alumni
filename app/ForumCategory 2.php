<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'forum_categories';
    
    public function fora()
    {
        return $this->hasMany(Forum::class, 'forum_category_id');
    }
}