<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Room extends Model
{
    use HasFactory;

    public function booking_rooms(){
        return $this->hasMany('App\Models\BookingRoom');
    }
    public function room_holds(){
        return $this->hasMany('App\Models\RoomHold');
    }
    public static function getAvailableRooms($check_in,$check_out,$adults,$children){
        if($children==null){
            $children=0;
        }
        $in=Carbon::parse($check_in)->addHours(12)->addSecond();
        $out=Carbon::parse($check_out)->addHours(12);
        return static::where('capacity',$adults + $children)->whereDoesntHave('booking_rooms',function($q) use($in,$out){
            $q->where(function($qu) use($in,$out){
                return $qu->where('check_in',"<=",$in)->where('check_out','>=',$out);
            });
            $q->orWhere(function($qu) use($in,$out){
                return $qu->where('check_in',">=",$in)->where('check_out','<=',$out);
            });
            $q->orWhere(function($qu) use($in,$out){
                return $qu->where('check_in',"<=",$in)->where('check_out',">=",$in)->where('check_out','<=',$out);
            });
            $q->orWhere(function($qu) use($in,$out){
                return $qu->where('check_in',">=",$in)->where('check_in',"<=",$out)->where('check_out','>=',$out);
            });
            return $q;
        })->with(['room_holds'=>function($q) use($in,$out){
            $q->where(function($q) use($in,$out){
                $q->where(function($qu) use($in,$out){
                    return $qu->where('check_in',"<=",$in)->where('check_out','>=',$out);
                });
                $q->orWhere(function($qu) use($in,$out){
                    return $qu->where('check_in',">=",$in)->where('check_out','<=',$out);
                });
                $q->orWhere(function($qu) use($in,$out){
                    return $qu->where('check_in',"<=",$in)->where('check_out',">=",$in)->where('check_out','<=',$out);
                });
                $q->orWhere(function($qu) use($in,$out){
                    return $qu->where('check_in',">=",$in)->where('check_in',"<=",$out)->where('check_out','>=',$out);
                });
            });
            $q->where('till',"<=",Carbon::now());
            return $q;
        }])->get();
    }
}
