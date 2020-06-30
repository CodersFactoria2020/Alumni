<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Thread; 
use App\Http\Resources\Post as PostResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   
    public function getAllPosts() 
    {
        $posts = PostResource::collection(Post::all());
        return $posts;
    }

    public function getPost(Post $post)
    {
        $postResource = new PostResource($post);
        return $postResource;
    }

    public function store(Request $request)
    {   
        Post::create([
            'body' => request('body'),
            'user_id' => Auth::id(),
            'thread_id'=>request('thread_id')
            ]);

        return $post;
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