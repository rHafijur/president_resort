<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function payment(Request $request){
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
        $arr=$request->only([
            'address','city','country','postcode','check_in','check_out','adults','children','rooms','nid'
        ]);
        $nights=Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
        $data=Crypt::encryptString(json_encode($arr));
        $data=str_split($data,255);
        // dd($data);
        $rooms=Room::whereIn('id',\json_decode($request->rooms))->get();
        foreach($rooms as $room){
            if($room->isHoldByOther($request->check_in,$request->check_out)){
                return \redirect()->route('search')->with("message","Your are late! Your room got hold by another person","warning");
            }
        }
        foreach($rooms as $room){
            $byMe=$room->holdByMe($request->check_in,$request->check_out);
            if($byMe==null){
                $room->holdRoomForMe($request->check_in,$request->check_out);
            }else{
                $byMe->extendTime();
            }
        }
        $total=0;
        foreach($rooms as $room){
            $total += $room->rent * $nights;
        }
        if(setting('amarpay.sandbox')==1){
            $url = 'https://sandbox.aamarpay.com/request.php';
        }else{
            $url = 'https://secure.aamarpay.com/request.php';
        }
        // dbb74894e82415a2f7ff0ec3a97e4183
        // aamarpaytest
        $fields = array(
            'store_id' => setting('amarpay.amarpay_store_id'),
            'amount' => $total,
            'payment_type' => 'VISA',
            'currency' => 'BDT',
            'tran_id' => \uniqid(),
            'cus_name' => $request->name,
            'cus_email' => $request->email,
            'cus_add1' => $request->address,
            'cus_add2' => $request->address,
            'cus_city' => $request->city,
            'cus_state' => $request->city,
            'cus_postcode' => $request->postcode,
            'cus_country' => $request->country,
            'cus_phone' => $request->phone,
            'cus_fax' => 'Not¬Applicable',
            'ship_name' => $request->name,
            'ship_add1' => $request->address,
            'ship_add2' => $request->address,
            'ship_city' => $request->city,
            'ship_state' => $request->city,
            'ship_postcode' => $request->postcode,
            'ship_country' => $request->country,
            'desc' => "Room Booking",
            'success_url' => route('payment_success'),
            'fail_url' => route('payment_failed'),
            'cancel_url' => route('payment_cancel'),
            // 'opt_a' => $request->rooms,
            // 'opt_b' => $request->check_in.";".$request->check_out,
            // 'opt_c' => $data,
            // 'opt_d' => "{$request->adults} {$request->children}",
            'opt_a' => isset($data[0])?$data[0]:"",
            'opt_b' => isset($data[1])?$data[1]:"",
            'opt_c' => isset($data[2])?$data[2]:"",
            'opt_d' => isset($data[3])?$data[3]:"",
            'signature_key' => setting('amarpay.amarpay_signature_key')
        );
        $fields_string="";
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        $fields_string = rtrim($fields_string, '&'); 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_POST, count($fields)); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));	

        curl_close($ch); 
        if(setting('amarpay.sandbox')==1){
            return redirect()->to('https://sandbox.aamarpay.com'.$url_forward);
        }else{
            return redirect()->to('https://secure.aamarpay.com'.$url_forward);
        }
    }

    public function success(Request $request){
        $data=$request->opt_a!=null?$request->opt_a:'';
        $data.=$request->opt_b!=null?$request->opt_b:'';
        $data.=$request->opt_c!=null?$request->opt_c:'';
        $data.=$request->opt_d!=null?$request->opt_d:'';
        $data=\json_decode(Crypt::decryptString($data));
        // dd($data);
        // dd($request);
        // ['customer_id','amount','method_name','transaction_id','pg_service_charge','store_amount'];
        $payment=Payment::create([
            'store_amount'=>$request->amount_original,
            'amount'=>$request->amount,
            'method_name'=>'AmarPay',
            'pg_service_charge'=>$request->pg_service_charge_bdt,
            'transaction_id'=>$request->pg_txnid
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
        'name'=>$request->cus_name,
        'email'=>$request->cus_email,
        'phone'=>$request->cus_phone,
        'address'=>$data->address,
        'city'=>$data->city,
        'country'=>$data->country,
        'post_code'=>$data->postcode,
        'nid'=>$data->nid 
        ]);
        foreach(\json_decode($data->rooms) as $room_id){
            $booking->booking_rooms()->create([
                'room_id'=>$room_id,
                'check_in'=>Carbon::parse($data->check_in)->addHours(12)->addSecond(),
                'check_out'=>Carbon::parse($data->check_out)->addHours(12),
            ]);
        }
        return redirect()->route('booking_success')->with('status','Package is purchaged successfully');
    }
    public function cancel(Request $request){
        // return redirect()->route('student.packages')->with('error','Payment unsuccessfull');
        // dd($request);
    }
    public function failed(Request $request){
        // return redirect()->route('student.packages')->with('error','Payment unsuccessfull');
        // dd($request);
    }
    public function all(Request $request){
        $payments=Payment::select("*");
        if($request->transaction_id){
            $payments=$payments->where('transaction_id',$request->transaction_id);
        }
        if($request->name){
            $payments=$payments->whereHas('user',function($users) use($request){
                return $users->where('name','like','%'.$request->name.'%');
            });
        }
        if($request->phone){
            $payments=$payments->whereHas('user',function($users) use($request){
                return $users->where('phone',$request->phone);
            });
        }
        if($request->to!=null && $request->from!=null){
            $payments=$payments->whereBetween('created_at',[Carbon::parse($request->from),Carbon::parse($request->to)]);
        }elseif($request->to!=null && $request->from==null){
            $payments=$payments->where('created_at','<=',Carbon::parse($request->to));
        }elseif($request->to==null && $request->from!=null){
            $payments=$payments->whereBetween('created_at',[Carbon::parse($request->from),Carbon::now()]);
        }
        $payments=$payments->latest()->paginate(20);
        return view('admin.payment.all',compact('payments'));
    }
}
