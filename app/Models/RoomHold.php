<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RoomHold extends Model
{
    use HasFactory;
    protected $fillable=['check_in','check_out','till','session_id','room_id'];

    public function extendTime($minutes=15){
        $this->till=Carbon::now()->addMinutes($minutes);
        $this->save();
        return true;
    }
}
