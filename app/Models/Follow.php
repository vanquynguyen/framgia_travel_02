<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = "follows";

    protected $fillable = ['follower_id', 'following_id'];

    public function follower_user() {

    	return $this->belongsTo(User::class, 'follower_id');
    }

    public function following_user() {

    	return $this->belongsTo(User::class, 'following_id');
    }
}
