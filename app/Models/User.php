<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";

    protected $appends = ['name_address'];

    protected $fillable = [
        'full_name', 'email', 'password', 'avatar', 'gender', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = ['level'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {

        return $this->hasMany(Post::class, 'user_id');
    }

    public function rates() {

        return $this->hasMany(Rate::class, 'user_id');
    }

    public function comments() {

        return $this->hasMany(Comment::class, 'user_id');
    }

    public function forks() {

        return $this->hasMany(Fork::class, 'user_id');
    }

    public function plans() {

        return $this->hasMany(Plan::class, 'user_id');
    }

    public function request_service() {

        return $this->hasMany(RequestService::class, 'user_id');
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getNameAddressAttribute() {
        return $this->attributes['full_name']. '' .$this->attributes['address'];
    }
}
