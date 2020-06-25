<?php

namespace App\Http\Controllers;

use App\Project;
use App\Language;
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

    public function showProject(Project $project)
    {
        return view('project.show', ['project' => $project]);
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
}