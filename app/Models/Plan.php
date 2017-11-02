<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = "plans";

    protected $fillable = [
    	'user_id', 'title', 'description', 'start_at', 'end_at', 
    	'rate_average', 'rate_count', 'price', 'status' 
    ];

    public function user() {

    	return $this->belongsTo(User::class, 'user_id');
    }

    public function rates() {

    	return $this->hasMany(Rate::class, 'plan_id');
    }

    public function forks() {

    	return $this->hasMany(Fork::class, 'plan_id');
    }

    public function plan_provinces() {

    	return $this->hasMany(PlanProvince::class, 'plan_id');
    }

    public function schedules() {

    	return $this->hasMany(Schedule::class, 'plan_id');
    }
}
