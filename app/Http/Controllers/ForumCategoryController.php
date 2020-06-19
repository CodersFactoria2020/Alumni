<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumCategory; 
use App\Forum;
use App\Post;
use App\User;

class ForumCategoryController extends Controller 
{
    public function getForumCategories(Request $request) 
    {
        $forumCategories = ForumCategory::with('fora')->get();

        for ($i = 0; $i < count($forumCategories); $i++)
        {
            $currentForumCategory = $forumCategories[$i];

            for ($j = 0; $j < count($currentForumCategory['fora']); $j++)
            {
                $currentForum = $currentForumCategory['fora'][$j];
                
                $currentForum['latest'] = Post::leftJoin('threads', 'posts.thread_id', '=', 'threads.id')
                ->where('threads.forum_id', '=', $currentForum->id)
                ->latest()
                ->select('posts.*', 'threads.title as thread_title', 'threads.id as thread_id')
                ->first();
                
                if(isset($currentForum['latest']->id)) 
                {
                    $currentForum['latest']['user'] = User::find($currentForum['latest']->user_id);
                }
               
                $currentForum['replies'] = Post::leftJoin('threads', 'posts.thread_id', '=', 'threads.id')
                ->where('threads.forum_id', '=', $currentForum->id)
                ->count();
            }
        }
        
        return response()->json($forumCategories, 200);
    }
}