<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;

class VoyagerBookingController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function index(Request $request){
        if($s= $request->s){
            $bookings=Booking::where('id',$s)->orWhere('phone',$s)->orWhere('name','like',"%".$s."%")->orWhere('email',$s)->latest()->get();
        }else{
            $bookings=Booking::latest()->get();
        }
        return view('admin.booking.index',compact('bookings'));
    }
    public function room_search(Request $request){
        $check_in=$request->check_in;
        $check_out=$request->check_out;
        $adults=$request->adults;
        $children=$request->children;
        $rooms=[];
        if($check_in && $check_out && $adults){
            $rooms=Room::getAvailableRooms($check_in,$check_out,$adults,$children);
        }
        return view("admin.booking.room_search",compact('check_in','check_out','adults','children','rooms'));
    }
}
