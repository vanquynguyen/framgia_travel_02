<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fork extends Model
{
    protected $table = "forks";

    protected $fillable = [
    	'user_id', 'plan_id', 'price', 'status',
    ];

    public function fork_schedules() {

    	return $this->hasMany(ForkSchedule::class, 'fork_id');
    }

    public function user() {

    	return $this->belongsTo(User::class, 'user_id');
    }

    public function plan() {

    	return $this->belongsTo(Plan::class, 'plan_id');
    }
}
