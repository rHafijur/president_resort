@extends('main.layouts.master')
@section('content')
@php
    $nights=Carbon\Carbon::parse($check_in)->diffInDays(Carbon\Carbon::parse($check_out));
@endphp
<style>
    .search-sec{
        margin-top: -12em !important;
    }
    .res{
        margin-left: 12em !important;
        margin-right: 12em !important;
        margin-top: 7em !important;
    }
    .check_in_out{
      font-size: 15px;
    }
    .check_in_out span{
      font-size: 1.2em;
      color:#256fdf;
    }
    .add_button{
      margin-top: 15px;
    }
    .nights{
      margin-top: 10px;
      font-size: 17px;
    }
    .nights span{
      font-size: 1.2em;
      color:#256fdf;
    }
    .total{
      margin-top: 10px;
      font-size: 18px;
    }
    .total span{
      font-size: 1.2em;
      color:#256fdf;
    }
</style>
<section class="promo-wrapper clearfix">
    <div class="promo-outer">
    </div>
</section>
<!-- Search style-->
<div class="search-wrapper">
<section class="container clearfix">
    <div class="search-sec">
    <div class="overlay">
        <form action="{{route('search')}}" method="get">
          <div class="border">
            <div class="ser-in-box">
                <input name="check_in" id="check_in" value="{{$check_in}}" placeholder="Arival Date" type="text" class="form-control datepicker-example8" required>
            </div>
            <div class="ser-in-box">
                <input type="text" id="check_out" value="{{$check_out}}" name="check_out" placeholder="Departure Date" class="form-control datepicker-example8" required>
            </div>
            <div class="ser-in-box">
                <div class="select-box">
                <select name="adults" class="select-menu" required>
                    <option value="">Adults</option>
                    <option @if($adults==1) selected @endif value="1">1</option>
                    <option @if($adults==2) selected @endif value="2">2</option>
                    <option @if($adults==3) selected @endif value="3">3</option>
                    <option @if($adults==4) selected @endif value="4">4</option>
                </select>
                </div>
            </div>
            <div class="ser-in-box">
                <div class="select-box">
                <select name="children" class="select-menu">
                    <option value="0">Children</option>
                    <option @if($children==1) selected @endif value="1">1</option>
                    <option @if($children==2) selected @endif value="2">2</option>
                    <option @if($children==3) selected @endif value="3">3</option>
                    <option @if($children==4) selected @endif value="4">4</option>
                </select>
                </div>
            </div>
            <div class="ser-in-box chk-button">
                <button type="submit" class="res-btn">Search</button>
            </div>
            </div>
        </form>
    </div>
    </div>
</section>
</div>
<!-- Search style-->
<div>
    <section class="res clearfix">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      @foreach ($rooms as $room)
                          <!-- One-->
                      <div class="room-wrapper">
                        <div class="media">
                          <div class="media-left"><a href="#"><img style="height: 20em; weight:30em" src="{{asset('storage/'.$room->image)}}" alt="{{$room->title}}"></a></div>
                          <div class="media-body">
                            <h2>{{$room->title}}</h2>
                            <p>{{$room->excerpt}}</p>
                            <h3>Room Facility</h3>
                            <h6>{{$room->facilities()}}</h6>
                          </div>
                          <div class="media-right">
                            <p>৳{{$room->rent}}<span>Per Night</span></p>
                            <a href="{{route('room.single',['id'=>$room->id])}}">view room</a>
                            <div class="room-button">
                              @if ($room->room_holds->count()>0)
                              <button class="btn btn-danger add_button" disabled>On 15 minutes hold</button>
                              @else
                              <button onclick="addRoom(this,{{$room->id}},{{$room->rent}},'{{$room->title}}')" class="btn btn-success add_button add">Add to list</button>
                              <button style="display: none;" onclick="removeRoom(this,{{$room->id}})" class="btn btn-warning add_button rem">Remove from list</button>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- One-->
                      @endforeach
                    </div>
                  </div>
            </div>
            <div class="col-md-3">
              <div class="check_in_out">
                Check in <span>{{$check_in}}</span> -> Check out <span>{{$check_out}}</span>
              </div>
              <div class="nights">
                <span>{{$nights}}</span> Nights; <span>{{$adults}}</span> Adults; <span>{{$children}}</span> Children;  
              </div>
              <div id="rooms"></div>
              <div class="total">
              </div>
              <button style="display: none;" onclick="formSubmit()" class="btn btn-success" id="proceed">Proceed</button>
            </div>
        </div>
    </section>
</div>
<form action="{{route("booking.proceed")}}" method="GET" id="submitForm">
  <input type="hidden" value="{{$check_in}}" name="check_in">
  <input type="hidden" value="{{$check_out}}" name="check_out">
  <input type="hidden" value="{{$adults}}" name="adults">
  <input type="hidden" value="{{$children}}" name="children">
  <input type="hidden" value="" name="rooms" id="inp_rooms">
</form>
@endsection
@push('script')
<script>
  $=jQuery;
  var rooms=[];
  function generatehtml(){
    var total=0;
    var h1=`<ul class="list-group list-group-flush">`;
    for(room of rooms){
      total+=room.rent;
      h1+=`<li class="list-group-item">`+room.title+`</li>`;
    }
    h1+=`<ul>`;
    $("#rooms").html(h1);
    if(rooms.length>0){
      $(".total").html(`<span>৳ `+total * {{$nights}} +`</span> Total`);
      $("#proceed").show();
    }else{
      $(".total").html("");
      $("#proceed").hide();
    }
  }
  function addRoom(el,id,rent,title){
    rooms.push({id:id,rent:rent,title:title});
    $(el).hide();
    $($($(el).closest(".room-button")).find(".rem")).show();
    generatehtml();
  }
  function removeRoom(el,id){
    var rs=[];
    for(room of rooms){
      if(id!=room.id){
        rs.push(room);
      }
    }
    $(el).hide();
    $($($(el).closest(".room-button")).find(".add")).show();
    rooms=rs;
    generatehtml();
  }
  function formSubmit(){
    var ids=[];
    for(room of rooms){
      ids.push(room.id);
    }
    $("#inp_rooms").val(JSON.stringify(ids));
    $("#submitForm").submit();
  }
</script>
<script>
  function dateToYMD(date) {
    var strArray=['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var d = date.getDate();
    var m = strArray[date.getMonth()];
    var y = date.getFullYear();
    return m + ' ' + (d <= 9 ? '0' + d : d) + ', ' + y;
}
  $('#check_in').Zebra_DatePicker({
    format: 'M d, Y',
    onClose: function() {
      var date=new Date(Date.parse($("#check_in").val()) + 1 * 24 * 60 * 60 * 1000);
      $('#check_out').Zebra_DatePicker({
          format: 'M d, Y',
          direction: [dateToYMD(date), false]
      });
      console.log();
    }
  })
</script>
@endpush