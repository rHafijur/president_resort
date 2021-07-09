<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Room;

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
        $rooms=\json_decode($request->rooms);
        $in=Carbon::parse($request->check_in);
        $out=Carbon::parse($request->check_out);
        $adults=$request->adults;
        $children=$request->children;
        $rooms=Room::whereIn('id',$rooms)->get();
        return view("main.booking_proceed",compact('rooms','request'));
    }
    public function booking_success(){
        return view('main.booking_success');
    }
}
