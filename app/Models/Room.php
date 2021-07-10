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
        $key=session('userkey');
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
        })->with(['room_holds'=>function($q) use($in,$out,$key){
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
            $q->where('till',">=",Carbon::now())->where("session_id","<>",$key);
            return $q;
        }])->get();
    }
    public function isHoldByOther($check_in,$check_out){
        $key=session('userkey');
        $in=Carbon::parse($check_in)->addHours(12)->addSecond();
        $out=Carbon::parse($check_out)->addHours(12);
        $holds= $this->room_holds()->where(function($q) use($in,$out){
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
        })->where('till',">=",Carbon::now())->where("session_id","<>",$key)->get()->count();
        if($holds>0){
            return true;
        }
        return false;
    }
    public function holdByMe($check_in,$check_out){
        $key=session('userkey');
        $in=Carbon::parse($check_in)->addHours(12)->addSecond();
        $out=Carbon::parse($check_out)->addHours(12);
        $hold= $this->room_holds()->where(function($q) use($in,$out){
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
        })->where('till',">=",Carbon::now())->where("session_id","<>",$key)->first();

        return $hold;
    }
    public function holdRoomForMe($check_in,$check_out,$minutes=15){
        $key=session('userkey');
        if($key==null){
            $key=uniqid();
            session(['userkey'=>$key]);
        }
        $in=Carbon::parse($check_in)->addHours(12)->addSecond();
        $out=Carbon::parse($check_out)->addHours(12);
        return $this->room_holds()->create([
            'check_in'=>$in,
            'check_out'=>$out,
            'session_id'=>$key,
            'till'=>Carbon::now()->addMinutes($minutes)
        ]);
    }
    public function facilities(){
        $fs=[];
        if($this->has_ac){
            $fs[]="AC";
        }
        if($this->has_tv){
            $fs[]="TV";
        }
        if($this->has_breakfast){
            $fs[]="Breakfast";
        }
        if($this->has_free_parking){
            $fs[]="Free Parking";
        }
        if($this->has_wifi){
            $fs[]="Wifi";
        }
        if($this->view){
            $fs[]=$this->view;
        }
        return implode(", ",$fs);
    }
}
