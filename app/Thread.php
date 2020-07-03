<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{   
    protected $fillable = ['title', 'forum_category_id', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function forum_category()
    {
        return $this->belongsTo(ForumCategory::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_thread');
    }
}