<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Thread; 
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   
    public function getAllPosts() 
    {
        $posts = PostResource::collection(Post::all());
        return $posts;
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return $posts;
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return $post;
    }

    
    
}