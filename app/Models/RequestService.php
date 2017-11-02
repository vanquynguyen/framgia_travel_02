<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    protected $table = "request_services";

    protected $fillable = [
    	'category_id', 'province_id', 'user_id', 
    	'name', 'address', 'open_time', 'price', 'status'
    ];

    public function categorie() {

    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function province() {

    	return $this->belongsTo(Province::class, 'province_id');
    }

    public function user() {

    	return $this->belongsTo(User::class, 'user_id');
    }
}
