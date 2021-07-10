 <!-- Welcome banner  style-->
 <div class="nasir-subscribe-form-row row">
    <div class="container">
      <div class="row this-dashed">
        <div class="this-texts">
          <h2>STAY TUNED WITH US</h2>
          <h3>Get our updated offers, discounts, events and much more!</h3>
        </div>
        <form action="{{route("email_subscribe")}}" method="post" class="this-form input-group">
          @csrf
          <input type="email" placeholder="Enter your email address" name="email" class="form-control"><span class="input-group-addon">
            <button type="submit" class="res-btn">subscribe<i class="fa fa-arrow-right"></i></button></span>
        </form>
      </div>
    </div>
  </div>
  <!-- Welcome banner  style-->
  <!-- footer  style-->
  <footer>
    <section class="clearfix footer-wrapper">
      <section class="container clearfix footer-pad">
        <div class="widget about-us-widget col-md-4 col-sm-6"><a href="{{route('home')}}"><img src="{{asset('storage/'.setting('site.logo'))}}" alt="" class="img-responsive"></a>
          <p>{{setting('site.description')}}</p>
          {{-- <ul class="nav">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fa fa-skype"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
          </ul> --}}
        </div>
        {{-- <div class="widget widget-links col-md-2 col-sm-6">
          <h4 class="widget_title">Explore</h4>
          <div class="widget-contact-list">
            <ul>
              <li><a href="activities.html">Activities</a></li>
              <li><a href="gallery1.html">Gallery</a></li>
              <li><a href="aminities.html">Aminities</a></li>
              <li><a href="single-room.html">Single Room</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
              <li><a href="our-restaurant.html">Dinning</a></li>
              <li><a href="offers.html">offers</a></li>
            </ul>
          </div>
        </div>
        <div class="widget widget-links col-md-2 col-sm-6">
          <h4 class="widget_title">Quick Links</h4>
          <div class="widget-contact-list">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="aboutus.html">About Us</a></li>
              <li><a href="suite-room.html">suits & Rooms</a></li>
              <li><a href="news-left.html">News</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="booking.html">Booking</a></li>
            </ul>
          </div>
        </div> --}}
        <div class="widget get-in-touch col-md-4 col-sm-6">
          <h4 class="widget_title">Get In Touch</h4>
          <div class="widget-contact-list">
            <ul>
              <li><i class="fa fa-map-marker"></i>
                <div class="fleft location_address"><b>{{setting('site.title')}}</b><br>{{setting('contact.contact_address')}}</div>
              </li>
              <li><i class="fa fa-phone"></i>
                <div class="fleft contact_no"><a href="tel:{{setting('contact.contact_phone')}}">{{setting('contact.contact_phone')}}</a></div>
              </li>
              <li><i class="fa fa-envelope-o"></i>
                <div class="fleft contact_mail"><a href="mailto:{{setting('contact.contact_email')}}">{{setting('contact.contact_email')}}</a></div>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </section>
    <section class="container clearfix footer-b-pad">
      <div class="footer-copy">
        <div class="pull-left fo-txt">
          <p>Copyright © {{setting('site.title')}} {{date("Y")}}. All rights reserved. </p>
        </div>
        <div class="pull-right fo-txt">
          <p>Developed by: <a href="https://www.facebook.com/hafijurrahman.sakib">Hafijur Rahman</a></p>
        </div>
      </div>
    </section>
  </footer>
  <!-- footer  style-->
  <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery.bxslider.js')}}"></script>
  <!-- owl carousel-->
  <script src="{{asset('assets/vendors/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{asset('assets/js/zebra_datepicker.js')}}"></script>
  <!-- jQuery ui js-->
  <script src="{{asset('assets/js/jquery.mixitup.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.fancybox.pack.js')}}"></script>
  <script src="{{asset('assets/vendors/jquery-ui-1.11.4/jquery-ui.min.js')}}"></script>
  <script src="{{asset('assets/vendors/imagelightbox/imagelightbox.min.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  @stack('script')
</body>
</html>