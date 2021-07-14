<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id',
        'payment_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'post_code',
        'nid',
        'company',
        'is_completed',
    ];

    public function payment(){
        return $this->belongsTo('App\Models\Payment');
    }
    public function booking_rooms(){
        return $this->hasMany('App\Models\BookingRoom');
    }
    public function rooms(){
        return $this->hasManyThrough('App\Models\Room','App\Models\BookingRoom');
    }
}
