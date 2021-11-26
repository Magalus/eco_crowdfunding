<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|max:2000',
        ]);
        
        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $comment = New Comment;
        $comment->body = $request->body;
        $comment->user()->associate($request->user());

        $project->comments()->save($comment);

        return new CommentResource($comment);
    }

    public function show(Request $request, Project $project, Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(Request $request, Project $project, Comment $comment)
    {
        $this->authorize('update', $comment);

        $validator = Validator::make($request->all(), [
            'body' => 'required|max:2000',
        ]);

        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $comment->body = $request->get('body', $comment->body);
        $comment->save();

        return new CommentResource($comment);
    }

    public function destroy(Project $project, Comment $comment)
    {
        $this->authorize('destroy', $comment);
        $comment->delete();
		return response(null, 204);
    }
}
