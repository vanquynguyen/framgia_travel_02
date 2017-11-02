<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "provinces";

    protected $fillable = ['name'];

    public function plan_provinces() {

    	return $this->hasMany(PlanProvince::class, 'province_id');
    }

    public function request_services() {

    	return $this->hasMany(RequestService::class, 'province_id');
    }

    public function service() {

    	return $this->hasMany(Service::class, 'province_id');
    }
}
