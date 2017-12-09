<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_at',
        'end_at',
        'rate_average',
        'rate_count',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'plan_id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'plan_id');
    }

    public function forks()
    {
        return $this->hasMany(Fork::class, 'plan_id');
    }

    public function planProvinces()
    {
        return $this->hasMany(PlanProvince::class, 'plan_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'plan_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'plan_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeWhereUser($query, $value)
    {
        return $query->where('user_id', $value)->with('planProvinces.province');
    }

    public function scopeSearch($query, $key)
    {
        return $query->whereHas('user', function($q) use ($key) {
            $q->where('full_name', 'like', '%'. $key . '%');
        });
    }

    public function scopeGetUser($query, $value)
    {
        return $query->find($value)->with('user')->first();
    }

    public function scopeTopRate($query)
    {
        return $query->OrderBy('created_at', 'asc')->Where('rate_average', '>=', '4.5')->Where('status', config('setting.status.approved'));
    } 

    public function scopeNewPlan($query)
    {
        return $query->orderBy('created_at', 'asc')->where('status', config('setting.status.approved'));
    }
}
