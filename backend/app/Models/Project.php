<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Like;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'title', 
        'resume',
        'description', 
        'goal',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
         return $this->hasMany('App\Models\Comment');
    }

    public function likes() {
		return $this->morphMany('App\Models\Like', 'likeable');
	}
}
