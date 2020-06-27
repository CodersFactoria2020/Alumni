<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Thread as ThreadResource;
use App\Post;
use App\Thread;
use App\User;
 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
class ThreadController extends Controller
{   
    public function getAllThreads() 
    {
        $threads = ThreadResource::collection(Thread::all());
        return $threads;
    }
    
    public function getThread(Thread $thread)
    {
        $threadResource = new ThreadResource($thread);
        return $threadResource;
    }

    public function index()
    {
        return view('foro.thread', ['auth_user' => auth()->user()]);
    }

    public function store(Request $request)
    {
        $projects = Project::create($request->all());

        $collection = Language::hydrate($request->languages);

        foreach($collection as $language) {
            $projects->languages()->attach($language->id);
        }

        return $projects;
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        $project->languages()->detach();

        $collection = Language::hydrate($request->languages);

        foreach($collection as $language) {
            $project->languages()->attach($language->id);
        }


        return $project;
    }

    public function destroy(Project $project)
    {
        $project->languages()->detach();
        $project->delete();
        return $project;
    }

    public function search($searchQuery)
    {
        $threads = Thread::with('user')
        ->where('title', 'like', '%'.strtolower($searchQuery). '%')
        ->select('threads.*')
        ->latest()
        ->paginate(10);

        foreach($threads as $thread)
        {
            $post = Post::with('user')->where('thread_id', $thread->id)->latest()->first();
            $thread['latestPost'] = $post;
        }
        
        return response()->json($threads, 200);
    }


}