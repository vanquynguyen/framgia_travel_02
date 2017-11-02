<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
    	'post_id', 
    	'user_id', 
    	'content'
    ];

    public function post() {

    	return $this->belongsTo(Post::class, 'post_id');
    }

    public function user() {

    	return $this->belongsTo(User::class, 'user_id');
    }
}
