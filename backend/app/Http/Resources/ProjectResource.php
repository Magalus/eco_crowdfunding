<?php

namespace App\Http\Resources;

use App\Http\Resources\CommentResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
	public function toArray($request) {
		// return parent::toArray($request);
		return [
			'id' => $this->id,
			'title' => $this->title,
            'resume' => $this->resume,
            'description' => $this->description,
            'goal' => $this->goal,
			'created_at' => $this->created_at->diffForHumans(),
			'updated_at' => $this->updated_at->diffForHumans(),
			'comments' => $this->comments ? CommentResource::collection($this->comments) : "Aucun commentaire",
			'user' => $this->user->name,
			'like_count' => $this->likes->count(),
			'users' => UserResource::collection($this->likes->pluck('user')),
		];
	}
}
