<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Testimonial;
use App\Models\EmailSubscription;
use Carbon\Carbon;

class PageController extends Controller
{
    public function index(){
        $rooms=Room::all();
        $testimonials=Testimonial::all();
        return view('home',compact('rooms','testimonials'));
    }
    public function search(Request $request){
        $check_in=$request->check_in;
        $check_out=$request->check_out;
        $adults=$request->adults;
        $children=$request->children;
        $rooms=[];
        if($check_in && $check_out && $adults){
            $rooms=Room::getAvailableRooms($check_in,$check_out,$adults,$children);
        }
        return view("main.search",compact('check_in','check_out','adults','children','rooms'));
    }
    public function emailSubscribe(Request $request){
        EmailSubscription::create([
            'email'=>$request->email,
        ]);
        return redirect()->back();
    }
    public function news(){
        
    }
}
