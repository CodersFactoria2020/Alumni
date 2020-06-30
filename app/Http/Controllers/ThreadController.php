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
    
    public function getLatestFourUpdatedThreadsInForumCategory()
    {
        $latestFourUpdatedThreads = ThreadResource::collection(Thread::orderBy('updated_at','desc')->take(4)->get());
        return $latestFourUpdatedThreads;
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
        $thread = Thread::create($request->all());

        $collection = Language::hydrate($request->languages);

        foreach($collection as $language) {
            $thread->languages()->attach($language->id);
        }

        return $thread;
    }

    public function update(Request $request, Thread $thread)
    {
        $thread->update($request->all());

        $thread->languages()->detach();

        $languageCollection = Language::hydrate($request->languages);

        foreach($languageCollection as $language) {
            $project->languages()->attach($language->id);
        }

        return $thread;
    }

    public function destroy(Thread $thread)
    {
        $thread->languages()->detach();
        $thread->delete();
        
        return $thread;
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