<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
	
    protected $fillable = [
    	'name',
    ];

    public function services() {

    	return $this->hasMany(Service::class, 'category_id');
    }

    public function request_services() {

    	return $this->hasMany(RequestService::class, 'category_id');
    }
}
