@extends('main.layouts.master')
@section('content')
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
        <div class="container">
          <h2 class="this-title">Single Room</h2>
        </div>
      </section>
      <section class="row final-breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
            <li><a href="{{route("home")}}">Home</a></li>
            <li class="active">{{$room->title}}</li>
          </ol>
        </div>
      </section>
      <!-- Header  Slider style-->
      <!-- News style-->
      <section class="container clearfix common-pad-inner">
        <div class="row">
          <div class="col-md-4 col-md-push-8">
            <div class="single-sidebar-widget sroom-sidebar">
              <!-- Booking Form style-->
              <div class="book-r-form">
                <div class="room-price">
                  <h6>starting from</h6>
                  <p>৳{{$room->rent}}<span>/ night</span></p>
                </div>
                <form action="{{route('search')}}" method="get">
                <div class="book-form">
                  <div class="col-md-12"><b>Arrive</b>
                    <input id="check_in" name="check_in" placeholder="Arival Date" type="text" class="form-control datepicker-example8" required>
                  </div>
                  <div class="col-md-12"><b>Departure</b>
                    <input id="check_out" name="check_out" type="text" placeholder="Departure Date" class="form-control datepicker-example8" required>
                  </div>
                  <div class="col-md-12"><b>Adults</b>
                    <div class="select-box">
                      <select name="adults" class="select-menu" required>
                        <option value="">Adults</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12"><b>children</b>
                    <div class="select-box">
                      <select name="children" class="select-menu">
                        <option value="">Children</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="chk-button">
                      <button type="submit" class="res-btn">Check Availability</button>
                    </div>
                  </div>
                </div>
                </form>
              </div>
              <!-- Booking Form style-->
              <!-- Budget Rooms style-->
              <div class="single-sidebar-widget-outer">
                <div class="sec-title">
                  <h2>Budget Rooms</h2>
                </div>
                <div class="popular-post">
                  <ul>
                    @foreach (App\Models\Room::where('id','<>',$room->id)->limit(4)->get() as $_room)
                    <li class="img-cap-effect">
                      <div class="img-box"><a href="{{route('room.single',[$_room->id])}}"><img style="height:92px;weight:120px" src="{{asset('storage/'.$_room->image)}}" alt=""></a></div>
                      <div class="content"><a href="{{route('room.single',[$_room->id])}}">
                          <h4>{{$_room->title}}</h4></a>
                        <h6>৳{{$_room->rent}} <span>Per Night</span></h6>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- Budget Rooms style-->
            </div>
          </div>
          <div class="col-md-8 col-md-pull-4">
            <div class="single-room-wrapper">
              <!-- Rooms Slider style-->
              <div class="room-slider-wrapper">
                <div class="single-r-wrapper">
                  <div class="single-sl-room">
                    <div data-hash="zero" class="owl-itemm"><img src="{{url("storage/".$room->image)}}" alt=""></div>
                    @foreach (json_decode($room->images) as $image)
                    <div data-hash="slider-image-{{$loop->iteration}}" class="owl-itemm"><img src="{{url("storage/".$image)}}" alt=""></div>
                    @endforeach
                  </div>
                    <a href="#zero" class="button secondary url"><img src="{{url("storage/".$room->image)}}" alt=""></a>
                    @foreach (json_decode($room->images) as $image)
                    <a href="#slider-image-{{$loop->iteration}}" class="button secondary url"><img src="{{url("storage/".$image)}}" alt=""></a>
                    @endforeach
                </div>
              </div>
              <!-- Rooms Slider style-->
              <!-- Description of Room style-->
              <div class="room-dec-wrapper">
                <h2>Description of Room</h2>
                {!!$room->description!!}
              </div>
              <!-- Description of Room style-->
              <!-- Room Facilities style-->
              <div class="room-fac-wrapper">
                <h2>Room Facilities</h2>
                <div class="row">
                  <div class="ro-facilitie">
                    <ul class="clearfix">
                      @if ($room->has_tv==1)
                      <li>
                        <div class="facilitie-i-box">
                          <h3>TV</h3><span><img src="{{asset('assets/images/rooms/icon1.gif')}}" alt=""></span>
                        </div>
                      </li>
                      @endif
                      @if ($room->has_breakfast==1)
                      <li>
                        <div class="facilitie-i-box">
                          <h3>Breakfast</h3><span><img src="{{asset('assets/images/rooms/icon2.gif')}}" alt=""></span>
                        </div>
                      </li>
                      @endif
                      @if ($room->has_free_parking==1)
                      <li>
                        <div class="facilitie-i-box">
                          <h3>free parking</h3><span><img src="{{asset('assets/images/rooms/icon3.gif')}}" alt=""></span>
                        </div>
                     </li>
                     @endif
                      @if ($room->has_wifi==1)
                      <li>
                        <div class="facilitie-i-box">
                          <h3>wi-fi service</h3><span><img src="{{asset('assets/images/rooms/icon4.gif')}}" alt=""></span>
                        </div>
                      </li>
                      @endif
                      @if ($room->has_ac==1)
                      <li>
                        <div class="facilitie-i-box">
                          <h3>AC Room</h3><span><img src="{{asset('assets/images/rooms/icon5.gif')}}" alt=""></span>
                        </div>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Room Facilities style-->
              <!-- Room Overview style-->
              <div class="room-overview">
                <h2>Room Overview</h2>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <colgroup>
                      <col class="col-xs-1">
                      <col class="col-xs-7">
                    </colgroup>
                    <tbody>
                      <tr>
                        <th scope="row"><code>Occupancy:</code></th>
                        <td>{{$room->occupancy}}</td>
                      </tr>
                      <tr>
                        <th scope="row"><code>Size : </code></th>
                        <td>{{$room->size}}</td>
                      </tr>
                      <tr>
                        <th scope="row"><code>View :</code></th>
                        <td>{{$room->view}}</td>
                      </tr>
                      <tr>
                        <th scope="row"><code>Room Service :</code></th>
                        <td>{{$room->room_service}}</td>
                      </tr>
                      <tr>
                        <th scope="row"><code>Terraces :</code></th>
                        <td>{{$room->terraces}}</td>
                      </tr>
                      <tr>
                        <th scope="row"><code>Free Pickup Facility :</code></th>
                        <td>{{$room->free_pickup_facility}}</td>
                      </tr>
                      <tr>
                        <th scope="row"><code>Internet Free :</code></th>
                        <td>{{$room->free_internet}}</td>
                      </tr>
                      <tr>
                        <th scope="row"><code>Gym  :</code></th>
                        <td>{{$room->gym}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Room Overview style-->
            </div>
          </div>
        </div>
      </section>
@endsection
@push('script')
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