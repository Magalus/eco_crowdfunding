<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return ProjectResource::collection($projects);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required",
            "resume" => "required",
            "description" => "required",
            "goal" => "required" 
        ]);

        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $project = New Project;
        $project->title = $request->title;
        $project->resume = $request->resume;
        $project->description = $request->description;
        $project->goal = $request->goal;
        $project->user()->associate($request->user());
        
        $project->save();

        return new ProjectResource($project);
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);
        
        $validator = Validator::make($request->all(), [
            "title" => "required",
            "resume" => "required",
            "description" => "required",
            "goal" => "required" 
        ]);

        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        
        $project->title = $request->get('title', $project->title);
        $project->resume = $request->get('resume', $project->resume);
        $project->description = $request->get('description', $project->description);
        $project->goal = $request->get('goal', $project->goal);
        
        $project->save();

        return new ProjectResource($project);;
    }

    public function destroy(Project $project)
    {
        $this->authorize('destroy', $project);
        $project->delete();
        return response(null, 204);
    }
}
