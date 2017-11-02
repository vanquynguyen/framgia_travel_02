<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedules";

	protected $fillable = [
		'plan_id', 'service_id', 'start_at', 'end_at', 'date', 'title', 'price', 'description',
	];

	public function plan() {

		return $this->belongsTo(Plan::class, 'plan_id');
	}

	public function service() {

		return $this->belongsTo(Service::class, 'service_id');
	}
}
