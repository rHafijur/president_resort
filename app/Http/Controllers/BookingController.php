<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Payment;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomHold;

class BookingController extends Controller
{
    public function proceed(Request $request){
        // dd($request);
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'rooms' => 'required',
        ]);
        $_rooms=\json_decode($request->rooms);
        // dd($_rooms);
        $in=Carbon::parse($request->check_in);
        $out=Carbon::parse($request->check_out);
        $adults=$request->adults;
        $children=$request->children;
        // $rooms=Room::whereIn('id',$rooms)->get();
        $rooms=[];
        foreach($_rooms as $_room){
            $room= Room::findOrFail($_room->id);
            $room->quantity=$_room->quantity;
            $rooms[]=$room;
        }
        foreach($rooms as $room){
            if($room->isHoldByOther($request->check_in,$request->check_out,$room->quantity)){
                // RoomHold::where('session_id',session('userkey'))->delete();
                return \redirect()->back()->with("message","Your are late! Your room got hold by another person","warning");
            }
        }
        foreach($rooms as $room){
            $byMe=$room->holdByMe($request->check_in,$request->check_out);
            if($byMe==null){
                $room->holdRoomForMe($request->check_in,$request->check_out,$room->quantity);
            }
        }
        return view("main.booking_proceed",compact('rooms','request'));
    }
    public function admin_proceed(Request $request){
        // dd($request);
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'rooms' => 'required',
        ]);
        // $rooms=\json_decode($request->rooms);
        $_rooms=\json_decode($request->rooms);
        $in=Carbon::parse($request->check_in);
        $out=Carbon::parse($request->check_out);
        $adults=$request->adults;
        $children=$request->children;
        // $rooms=Room::whereIn('id',$rooms)->get();
        $rooms=[];
        foreach($_rooms as $_room){
            $room= Room::findOrFail($_room->id);
            $room->quantity=$_room->quantity;
            $rooms[]=$room;
        }
        foreach($rooms as $room){
            if($room->isHoldByOther($request->check_in,$request->check_out,$room->quantity)){
                return \redirect()->back()->with("message","Your are late! Your room got hold by another person","warning");
            }
        }
        foreach($rooms as $room){
            $byMe=$room->holdByMe($request->check_in,$request->check_out);
            if($byMe==null){
                $room->holdRoomForMe($request->check_in,$request->check_out,$room->quantity);
            }
        }
        return view("admin.booking.proceed",compact('rooms','request'));
    }
    public function booking_success(){
        // dd(session('userkey'));
        RoomHold::where('session_id',session('userkey'))->delete();
        return view('main.booking_success');
    }
    public function admin_book(Request $request){
        $request->validate([
            'name'=>'required',
            'nid'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'country'=>'required',
            'postcode'=>'required',
            'check_in'=>'required',
            'check_out'=>'required',
            'adults'=>'required',
            'children'=>'required',
            'rooms'=>'required',
        ]);
        $nights=Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
        // $rooms=Room::whereIn('id',\json_decode($request->rooms))->get();
        $_rooms=\json_decode($request->rooms);
        $rooms=[];
        foreach($_rooms as $_room){
            $room= Room::findOrFail($_room->id);
            $room->quantity=$_room->quantity;
            $rooms[]=$room;
        }
        // dd($rooms);
        $total=0;
        foreach($rooms as $room){
            $total += $room->rent * $nights * $room->quantity;
        }
        $payment=Payment::create([
            'store_amount'=>$total,
            'amount'=>$total,
            'method_name'=>'Manual Payment',
            'pg_service_charge'=>0,
            'transaction_id'=>"manualpayment"
        ]);
        // 'customer_id',
        // 'payment_id',
        // 'name',
        // 'email',
        // 'phone',
        // 'address',
        // 'city',
        // 'country',
        // 'postcode',
        // 'nid',
        // 'company',
        $booking= Booking::create([
        'payment_id'=>$payment->id,
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'city'=>$request->city,
        'country'=>$request->country,
        'post_code'=>$request->postcode,
        'nid'=>$request->nid 
        ]);
        foreach(\json_decode($request->rooms) as $room){
            $booking->booking_rooms()->create([
                'room_id'=>$room->id,
                'number_of_rooms'=>$room->quantity,
                'check_in'=>Carbon::parse($request->check_in)->addHours(12)->addSecond(),
                'check_out'=>Carbon::parse($request->check_out)->addHours(12),
            ]);
        }
        // return redirect()->route('amdmin.booking.success')->with('status','Package is purchaged successfully');
        return redirect(url('admin/bookings'))->with('message',"Room Booked successfully","success");
    }
}
