@extends('main.layouts.master')
@section('content')
 <!-- Header  Inner style-->
 <section class="row final-inner-header">
    <div class="container">
      <h2 class="this-title">Contact us</h2>
    </div>
  </section>
  <section class="row final-breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Home</a></li>
        <li class="active">Contact us</li>
      </ol>
    </div>
  </section>
  <!-- Header  Slider style-->
  <!-- Booking style-->
  <section class="container clearfix common-pad booknow">
    <div class="sec-header">
      <h2>Send a message</h2>
      <h3>Pick a room that best suits your taste and budget</h3>
    </div>
    <div class="row nasir-contact">
      <div class="col-md-8">
        <div class="book-left-content input_form">
            @if (session('message'))
            <section class="container clearfix alt">
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                  </div>
            </section>
            @endif
          <form id="contactForm" action="{{route('contact.submit')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12"><span>Your Name</span>
                <input id="name" type="text" name="name" placeholder="Your name" class="form-control" required>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12"><span>Your Email</span>
                <input id="email" type="email" name="email" placeholder="Your Email" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span>Subject</span>
                <input id="subject" type="text" name="subject" placeholder="Subject" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span>Message</span>
                <textarea id="message" rows="6" name="body" placeholder="Message" class="form-control" required></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" value="submit now" class="res-btn">Submit Now</button>
              </div>
            </div>
          </form>
          <div id="success">
            <p>Your message sent successfully.</p>
          </div>
          <div id="error">
            <p>Something is wrong. Message cant be sent!</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-info">
          <h2>Contact Info</h2>
          <div class="media-contact clearfix">
            <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-map-marker"></i></div>
            <div class="media-contact-info">
              <p>{{setting('contact.contact_address')}}</p>
            </div>
          </div>
          <div class="media-contact clearfix">
            <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-envelope-o"></i></div>
            <div class="media-contact-info">
              <p><a href="mailto:{{setting('contact.contact_email')}}">{{setting('contact.contact_email')}}</a></p>
            </div>
          </div>
          <div class="media-contact clearfix">
            <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-phone"></i></div>
            <div class="media-contact-info">
              <p>
                {{setting('contact.contact_phone')}}
              </p>
            </div>
          </div>
          {{-- <div class="media-contact clearfix">
            <div class="media-contact-icon"><i aria-hidden="true" class="icon icon-Timer"></i></div>
            <div class="media-contact-info">
              <p><a href="tel:18005622487"><i>+ 1800 562 2487</i></a><br><a href="tel:32155468975"><i>+ 3215 546 8975</i></a></p>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </section>
  <!-- Booking style-->
  <!-- TT-CONTACT-MAP-->
  {{-- <div id="map-canvas" data-lat="51.477254" data-lng="-0.026888" data-zoom="14" class="tt-contact-map map-block"></div>
  <div class="addresses-block"><a data-lat="51.477254" data-marker="images/marker.png" data-lng="-0.026888" data-string="1. Here is some address or email or phone or something else..."></a></div> --}}
  <!-- Welcome banner  style-->
@endsection
@push('script')
@endpush