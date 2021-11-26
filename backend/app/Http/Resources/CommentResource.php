<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
	public function toArray($request) {
		// return parent::toArray($request);
		return [
			'id' => $this->id,
			'body' => $this->body,
			'created_at' => $this->created_at->diffForHumans(),
			'updated_at' => $this->updated_at->diffForHumans(),
			'user' => $this->user->name,
			'like_count' => $this->likes->count(),
			'users' => UserResource::collection($this->likes->pluck('user')),
		];
	}
}
