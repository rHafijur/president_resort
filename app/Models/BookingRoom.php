<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class BookingRoom extends Model
{
    use HasFactory;
    protected $fillable=['booking_id','room_id','check_in','check_out','number_of_rooms'];

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }
    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
    public function checkInDate(){
        return Carbon::parse($this->check_in)->toFormattedDateString();
    }
    public function checkOutDate(){
        return Carbon::parse($this->check_out)->toFormattedDateString();
    }

}
