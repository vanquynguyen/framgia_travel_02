<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = "rates";

    protected $fillable = [
    	'plan_id', 'user_id', 'rate_point', 'rate_at'
    ];

    public function user() {

    	return $this->belongsTo(User::class, 'user_id');
    }

    public function plan() {

    	return $this->belongsTo(Plan::class, 'plan_id');
    }
}
