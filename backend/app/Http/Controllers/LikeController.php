<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Project;
use App\Models\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeProject(Request $request, Project $project) {

        if ($project->likes->where('user_id', $request->user()->id)->count() > 0) {
            $project->likes()->where('user_id', $request->user()->id)->delete();
            return response()->json([
                "status" => "failed",
                "message" => "Projet déliké avec succès"
            ]);
        }

		$like = new Like;
		$like->user()->associate($request->user());
		$project->likes()->save($like);

        return response()->json([
            "status" => "success", 
            "message" => "Projet liké avec succès"
        ]);
	}

    public function likeComment(Request $request, Project $project, Comment $comment) {

        if ($comment->likes->where('user_id', $request->user()->id)->count() > 0) {
            $comment->likes()->where('user_id', $request->user()->id)->delete();
            return response()->json([
                "status" => "failed",
                "message" => "Commentaire déliké avec succès"
            ]);
        }

		$like = new Like;
		$like->user()->associate($request->user());
		$comment->likes()->save($like);

        return response()->json([
            "status" => "success", 
            "message" => "Commentaire liké avec succès"
        ]);
	}
}
