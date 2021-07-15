<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomHold;
use App\Models\Testimonial;
use App\Models\EmailSubscription;
use App\Models\ContactMessage;
use App\Models\Page;
use Carbon\Carbon;

class PageController extends Controller
{
    public function index(){
        $rooms=Room::all();
        $testimonials=Testimonial::all();
        return view('home',compact('rooms','testimonials'));
    }
    public function search(Request $request){
        // dd(session('userkey'));
        if(session('userkey')==null){
            session(['userkey' => uniqid()]);
        }
        RoomHold::where('session_id',session('userkey'))->delete();
        $check_in=$request->check_in;
        $check_out=$request->check_out;
        $adults=$request->adults;
        $children=$request->children;
        $rooms=[];
        if($check_in && $check_out && $adults){
            $rooms=Room::getAvailableRooms($check_in,$check_out,$adults,$children);
        }
        // dd($rooms);
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
    public function contact(Request $request){
        ContactMessage::create($request->only(['name','email','subject','body']));
        return redirect()->back()->with('message','Thanks for contacting us. We will reply back ASAP.');
    }
    public function page($slug){
        $page=Page::where('slug',$slug)->firstOrFail();
        return view('main.page',compact('page'));
    }
}
