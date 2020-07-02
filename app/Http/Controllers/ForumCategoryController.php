<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumCategory; 
use App\Http\Resources\ForumCategory as ForumCategoryResource;
use App\Thread;
use App\Post;
use App\User;
use App\Tag;
use App\Category; 

class ForumCategoryController extends Controller 
{
    public function index()
    {
        return view('foro.index', ['auth_user' => auth()->user()]);
    }

    public function foro()
    {
        return view('foro.foro', ['auth_user' => auth()->user()]);
    }

    public function getForumCategories() 
    {
        $forumCategories = ForumCategoryResource::collection(ForumCategory::all());
        return $forumCategories;
    }

    public function getForumCategory(ForumCategory $forumCategory)
    {
        $forumCategoryResource = new ForumCategoryResource($forumCategory);
        return $forumCategoryResource;
    }
}