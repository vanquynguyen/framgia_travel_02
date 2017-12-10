<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'plan_id',
        'user_id',
        'full_name',
        'email',
        'country',
        'phone',
        'start_at',
        'end_at',
        'adult',
        'child',
        'total_amount',
        'status'
    ];

    public function customers()
    {
        return $this->hasmany(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::Class);
    }

    public function scopeWhereBooking($query, $value1, $value2)
    {
        return $query->orderBy('created_at', 'asc')->Where('user_id', $value1)->Where('plan_id', $value2);
    }

    public function scopeTopBooking($query)
    {
        return $query->with('plan.galleries')
            ->get()
            ->keyby('plan_id')
            ->sortByDesc(function ($booking) {
                return $booking->plan->count();
            })->take(3);
    }
}
