@extends('main.layouts.master')
@section('content')
        <!-- Header  Inner style-->
        <section class="row final-inner-header">
            <div class="container">
              <h2 class="this-title">{{$page->title}}</h2>
            </div>
          </section>
          <section class="row final-breadcrumb">
            <div class="container">
              <ol class="breadcrumb">
                <li><a href="{{route("home")}}">Home</a></li>
                <li class="active">{{$page->title}}</li>
              </ol>
            </div>
          </section>
          <!-- Header  Slider style-->
          <!-- About gallery style-->
          

          <section class="container clearfix common-pad-inner about-info-box">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="sec-header">
                  <h2>{{$page->title}}</h2>
                  {{-- <h3>{{setting('gallery.gallery_subtitle')}}</h3> --}}
                </div>
                {!!$page->body!!}
              </div>
            </div>
          </section>
          <section class="container clearfix common-pad-inner about-info-box">
            <div class="row">
              <img class="img-fluid" src="{{asset('storage/'.$page->image)}}" alt="">
            </div>
          </section>
          <!-- About gallery style-->
@endsection