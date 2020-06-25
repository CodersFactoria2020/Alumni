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
        return view('foro.index');
    }

    public function getForumCategories() 
    {
        $forumCategories = ForumCategoryResource::collection(ForumCategory::all());
        return $forumCategories;
    }
}