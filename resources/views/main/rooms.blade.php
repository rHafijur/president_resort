@extends('main.layouts.master')
@section('content')
<!-- Header  Inner style-->
<section class="row final-inner-header">
    <div class="container">
      <h2 class="this-title">Rooms & Suits</h2>
    </div>
  </section>
  <section class="row final-breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{route("home")}}">Home</a></li>
        <li class="active">Rooms & Suits</li>
      </ol>
    </div>
  </section>
  <!-- Header  Slider style-->
  <!-- About Resort style-->
  <section class="container clearfix common-pad-inner about-info-box">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="sec-header3">
          <h2>Rooms and Suits</h2>
          <h3>Pick a room that best suits your taste and budget</h3>
        </div>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.</p>
      </div>
    </div>
  </section>
  <!-- About Resort style-->
  <!-- Room 2 style-->
  <section class="clearfix news-wrapper">
    <div class="container clearfix common-pad-room">
      <div class="row">
        @foreach ($rooms as $room)
            @if ($loop->iteration % 2 == 1)
                <!-- One-->
                <div class="room-t-wrapper">
                    <div class="col-lg-7 col-md-12 img-wrap">
                    <div class="img-holder"><img src="{{asset('storage/'.$room->image)}}" alt="{{$room->title}}" class="img-responsive"></div>
                    </div>
                    <div class="col-lg-5 col-md-12 content">
                    <h2>{{$room->title}}</h2>
                    <p>{{$room->excerpt}}</p>
                    <div class="bottom-content">
                        <div class="pull-left">
                        <p>৳{{$room->rent}}<span>Per Night</span></p>
                        </div>
                        <div class="pull-right"><a href="{{route('room.single',['id'=>$room->id])}}">view room</a></div>
                    </div>
                    </div>
                </div>
                <!-- One-->
            @else
                <!-- Two-->
                <div class="room-t-wrapper room-l-wrapper">
                    <div class="col-lg-5 col-md-12 content">
                    <h2>{{$room->title}}</h2>
                    <p>{{$room->excerpt}}</p>
                    <div class="bottom-content">
                        <div class="pull-left">
                            <p>৳{{$room->rent}}<span>Per Night</span></p>
                        </div>
                        <div class="pull-right"><a href="{{route('room.single',['id'=>$room->id])}}">view room</a></div>
                    </div>
                    </div>
                    <div class="col-lg-7 col-md-12 img-wrap">
                    <div class="img-holder"><img src="{{asset('storage/'.$room->image)}}" alt="{{$room->title}}" class="img-responsive"></div>
                    </div>
                </div>
                <!-- Two-->
            @endif
        @endforeach
      </div>
    </div>
  </section>
  <!-- Room 2 style-->
@endsection