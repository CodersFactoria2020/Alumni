<?php

namespace App\Http\Controllers;

use App\Project;
use App\Tag;
use App\Http\Resources\Project as ProjectResource;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function all()
    {
        $projects = ProjectResource::collection(Project::all());
        return $projects;
    }

    public function getProject(Project $project)
    {
        return New ProjectResource($project);
    }

    public function store(Request $request)
    {
        $projects = Project::create($request->all());

        $collection = Tag::hydrate($request->tags);

        foreach($collection as $tag) {
            $projects->tags()->attach($tag->id);
        }

        return $projects;
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        $project->tags()->detach();

        $collection = Tag::hydrate($request->tags);

        foreach($collection as $tag) {
            $project->tags()->attach($tag->id);
        }


        return $project;
    }

    public function destroy(Project $project)
    {
        $project->tags()->detach();
        $project->delete();
        return $project;
    }
}
