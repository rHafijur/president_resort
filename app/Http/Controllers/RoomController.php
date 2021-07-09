<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
class RoomController extends Controller
{
    public function index(){
        $rooms=Room::all();
        return view('main.rooms',compact('rooms'));
    }
    public function single($id){
        $room=Room::findOrFail($id);
        return view('main.single_room',compact('room'));
    }
}
