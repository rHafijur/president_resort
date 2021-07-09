<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
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
