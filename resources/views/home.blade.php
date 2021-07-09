@extends('main.layouts.master')
@section('content')
    
    <!-- Header  Slider style-->
    <!-- Home Slider-->
    <div id="minimal-bootstrap-carousel" data-ride="carousel" class="carousel home2carousel slide carousel-fade shop-slider">
        <!-- Wrapper for slides-->
        <div role="listbox" class="carousel-inner">
          <div style="background-image: url({{asset('assets/images/slider/1.jpg')}});backgroudn-position: center right;" class="item active slide-1">
            <div class="carousel-caption nhs-caption nhs-caption1">
              <div class="thm-container">
                <div class="box valign-middle">
                  <div class="content text-left">
                    <h2 data-animation="animated fadeInUp" class="this-title">Spend Your Dream Holidays</h2>
                    <p data-animation="animated fadeInDown">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quit.</p><a data-animation="animated fadeInRight" href="#" class="nhs-btn">know more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div style="background-image: url({{asset('assets/images/slider/2.jpg')}});backgroudn-position: center right;" class="item slide-2">
            <div class="carousel-caption nhs-caption nhs-caption2">
              <div class="thm-container">
                <div class="box valign-middle">
                  <div class="content text-center">
                    <h2 data-animation="animated fadeInUp" class="this-title">Spend Your Dream Holidays</h2>
                    <p data-animation="animated fadeInDown">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quit.</p><a data-animation="animated fadeInRight" href="#" class="nhs-btn">know more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div style="background-image: url({{asset('assets/images/slider/3.jpg')}});backgroudn-position: center right;" class="item slide-3">
            <div class="carousel-caption nhs-caption nhs-caption3">
              <div class="thm-container">
                <div class="box valign-middle">
                  <div class="content text-left">
                    <h2 data-animation="animated fadeInUp" class="this-title">Make Your Memorable Holidays in a LakeResort</h2>
                    <p data-animation="animated fadeInDown">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quit.</p><a data-animation="animated fadeInRight" href="#" class="nhs-btn">know more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Controls--><a href="#minimal-bootstrap-carousel" role="button" data-slide="prev" class="left carousel-control"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a><a href="#minimal-bootstrap-carousel" role="button" data-slide="next" class="right carousel-control"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
      </div>
      <!-- Search style-->
      <div class="search-wrapper">
        <section class="container clearfix">
          <div class="search-sec">
            <div class="overlay">
              <form action="{{route('search')}}" method="get">
                <div class="border">
                  <div class="ser-in-box">
                      <input name="check_in" id="check_in" value="" placeholder="Arival Date" type="text" class="form-control datepicker-example8" required>
                  </div>
                  <div class="ser-in-box">
                      <input type="text" id="check_out" value="" name="check_out" placeholder="Departure Date" class="form-control datepicker-example8" required>
                  </div>
                  <div class="ser-in-box">
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
                  <div class="ser-in-box">
                      <div class="select-box">
                      <select name="children" class="select-menu">
                          <option value="0">Children</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
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
      <!-- Welcome to Lake Resort style-->
      <section class="wel-wrapper clearfix">
        <section class="container clearfix wel-pad">
          <div class="wel-content">
            <h1>Welcome to Lake Resort</h1>
            <h2>Pick a room that best suits your taste and budget</h2>
            <p>Neque porro quisquam est, qui dolorem ipsum quia dqAolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit.</p>
          </div>
          <div class="row">
            <div class="single_wel_cont home4v col-md-3 col-sm-6"><a href="#" class="wel-box">
                <div class="icon-box"><img src="{{asset('assets/images/welcome/icon-3.png')}}" alt=""></div>
                <h4>Lexuary Spa</h4>
                <div class="overlay transition3s">
                  <div class="icon_position_table">
                    <div class="icon_container border_round">
                      <h2>Lexuary Spa</h2>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia  orro quisquam estdqAolor </p>
                    </div>
                  </div>
                </div></a></div>
            <div class="single_wel_cont home4v col-md-3 col-sm-6"><a href="#" class="wel-box">
                <div class="icon-box"><img src="{{asset('assets/images/welcome/icon-1.png')}}" alt=""></div>
                <h4>Inhouse Restaurant</h4>
                <div class="overlay transition3s">
                  <div class="icon_position_table">
                    <div class="icon_container border_round">
                      <h2>Inhouse Restaurant</h2>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia  orro quisquam estdqAolor </p>
                    </div>
                  </div>
                </div></a></div>
            <div class="single_wel_cont home4v col-md-3 col-sm-6"><a href="#" class="wel-box">
                <div class="icon-box"><img src="{{asset('assets/images/welcome/icon-2.png')}}" alt=""></div>
                <h4>Fitness Gym</h4>
                <div class="overlay transition3s">
                  <div class="icon_position_table">
                    <div class="icon_container border_round">
                      <h2>Fitness Gym</h2>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia  orro quisquam estdqAolor </p>
                    </div>
                  </div>
                </div></a></div>
            <div class="single_wel_cont home4v col-md-3 col-sm-6"><a href="#" class="wel-box">
                <div class="icon-box"><img src="{{asset('assets/images/welcome/icon-3.png')}}" alt=""></div>
                <h4>Delicious Food</h4>
                <div class="overlay transition3s">
                  <div class="icon_position_table">
                    <div class="icon_container border_round">
                      <h2>Delicious Food</h2>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia  orro quisquam estdqAolor </p>
                    </div>
                  </div>
                </div></a></div>
          </div>
        </section>
      </section>
      <!-- Welcome to Lake Resort style-->
      
      <!-- Rooms And Suits style-->
      <section class="container clearfix common-pad">
        <div class="sec-header">
          <h2>Rooms And Suits</h2>
          <h3>Pick a room that best suits your taste and budget</h3>
        </div>
        <div class="room-slider">
          <div class="roomsuite-slider">
            @foreach ($rooms as $room)
            <div class="room-suite">
              <div class="item"><a href="{{route('room.single',['id'=>$room->id])}}">
                  <div class="ro-img"><img src='{{asset("storage/{$room->image}")}}'' alt="{{$room->title}}" class="img-responsive"></div>
                  <div class="ro-txt">
                    <div class="left-h pull-left">
                      <p>{{$room->title}}</p>
                    </div>
                    <div class="right-p pull-right">
                      <p>৳{{$room->rent}}<span>Per Night</span></p>
                    </div>
                  </div></a></div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Rooms And Suits style-->
      <!-- Know About Us style-->
      <div class="fluid-know-area">
        <div class="work-image-ser"><img src="{{asset('assets/images/know-about-us/1.jpg')}}" alt="" class="img-responsive"></div>
        <div class="service-promo">
          <div class="promo-content">
            <div class="know-top">
              <h2>Know About Us</h2>
              <h3>Discover what makes us a five star hotel</h3>
              <p>Neque porro quisquam est, qui dolorem ipsum quia dqAolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Neque porro quisquam est, qui dolorem ipsum quia dqAolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi yu enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit.</p>
            </div>
            <div class="know-bot">
              <ul>
                <li>
                  <div class="about-img"><img src="{{asset('assets/images/know-about-us/icon1.png')}}" alt="" class="img-responsive"></div>
                  <div class="about-cont">
                    <p>Dedicated<br>Team</p>
                  </div>
                </li>
                <li>
                  <div class="about-img"><img src="{{asset('assets/images/know-about-us/icon2.png')}}" alt="" class="img-responsive"></div>
                  <div class="about-cont">
                    <p>Best<br>Advisors</p>
                  </div>
                </li>
                <li>
                  <div class="about-img"><img src="{{asset('assets/images/know-about-us/icon3.png')}}" alt="" class="img-responsive"></div>
                  <div class="about-cont">
                    <p>24/7<br>Supports</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Know About Us style-->
      <!-- Our Resort Values style-->
      <section class="container clearfix common-pad our-res">
        <div class="row">
          <div class="col-md-4 col-sm-4 pull-left spa-offer">
            <div class="img_holder"><img src="{{asset('assets/images/our-resort/1.jpg')}}" alt="" class="img-responsive">
              <div class="overlay">
                <div class="room-ad-cont">
                  <h2>25% <span>off</span></h2>
                  <h3>Weeken Spa Offer</h3>
                  <p>Enjoy a luxurious SPA weekend dedicated to helping you unwind.</p><a href="booking.html">Read more</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="left-pad">
              <div class="sec-header">
                <h2>Our Resort Values</h2>
                <h3>Pick a room that best suits your taste and budget</h3>
              </div>
              <div class="tab-title-box">
                <ul role="tablist" class="clearfix">
                  <li data-tab-name="quality" class="active"><a href="#quality" aria-controls="quality" role="tab" data-toggle="tab">Quality</a></li>
                  <li data-tab-name="ourvision"><a href="#ourvision" aria-controls="ourvision" role="tab" data-toggle="tab">Our vision</a></li>
                  <li data-tab-name="success"><a href="#success" aria-controls="success" role="tab" data-toggle="tab">Success</a></li>
                </ul>
              </div>
              <div class="tab-content-box tab-content">
                <div id="quality" class="single-tab-content tab-pane fade in active row">
                  <div class="col-md-12">
                    <div class="content-box">
                      <h2>Resort Quality</h2>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                      <div class="row">
                        <div class="col-md-4">
                          <ul>
                            <li><i class="fa fa-arrow-circle-right"></i> Our Company Growth</li>
                            <li><i class="fa fa-arrow-circle-right"></i> 1000 Employed</li>
                            <li><i class="fa fa-arrow-circle-right"></i> Customer Relationship</li>
                          </ul>
                        </div>
                        <div class="col-md-4">
                          <ul>
                            <li><i class="fa fa-arrow-circle-right"></i> Our Company Growth</li>
                            <li><i class="fa fa-arrow-circle-right"></i> 1000 Employed</li>
                            <li><i class="fa fa-arrow-circle-right"></i> Customer Relationship</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="ourvision" class="single-tab-content tab-pane fade row">
                  <div class="col-md-12">
                    <div class="content-box">
                      <h2>Resort Quality</h2>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                      <div class="row">
                        <div class="col-md-4">
                          <ul>
                            <li><i class="fa fa-arrow-circle-right"></i> Our Company Growth</li>
                            <li><i class="fa fa-arrow-circle-right"></i> 1000 Employed</li>
                            <li><i class="fa fa-arrow-circle-right"></i> Customer Relationship</li>
                          </ul>
                        </div>
                        <div class="col-md-4">
                          <ul>
                            <li><i class="fa fa-arrow-circle-right"></i> Our Company Growth</li>
                            <li><i class="fa fa-arrow-circle-right"></i> 1000 Employed</li>
                            <li><i class="fa fa-arrow-circle-right"></i> Customer Relationship</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="success" class="single-tab-content tab-pane fade row">
                  <div class="col-md-12">
                    <div class="content-box">
                      <h2>Resort Quality</h2>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                      <div class="row">
                        <div class="col-md-4">
                          <ul>
                            <li><i class="fa fa-arrow-circle-right"></i> Our Company Growth</li>
                            <li><i class="fa fa-arrow-circle-right"></i> 1000 Employed</li>
                            <li><i class="fa fa-arrow-circle-right"></i> Customer Relationship</li>
                          </ul>
                        </div>
                        <div class="col-md-4">
                          <ul>
                            <li><i class="fa fa-arrow-circle-right"></i> Our Company Growth</li>
                            <li><i class="fa fa-arrow-circle-right"></i> 1000 Employed</li>
                            <li><i class="fa fa-arrow-circle-right"></i> Customer Relationship</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Our Resort Values style-->
      <!-- satisfied with the Resort-->
      <section class="promo-wrapper clearfix">
        <div class="promo-outer">
          <ul class="bxslider">
            <li>
              <div class="promo-imgslider">
                <div class="container">
                  <div class="promo-content">
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2>Am more than satisfied with the Resort</h2>
                        <p>Tdolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p><a href="booking.html">more info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="promo-imgslider">
                <div class="container">
                  <div class="promo-content">
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2>Am more than satisfied with the Resort</h2>
                        <p>Tdolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p><a href="booking.html">more info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="promo-imgslider">
                <div class="container">
                  <div class="promo-content">
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2>Am more than satisfied with the Resort</h2>
                        <p>Tdolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p><a href="booking.html">more info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="promo-imgslider">
                <div class="container">
                  <div class="promo-content">
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2>Am more than satisfied with the Resort</h2>
                        <p>Tdolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p><a href="#">more info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
      <!-- satisfied with the Resort-->
      <!-- Testimonials Resort-->
      <section class="container clearfix common-pad testimonials-sec">
        <div class="sec-header">
          <h2>Testimonials</h2>
          <h3>Pick a room that best suits your taste and budget</h3>
        </div>
        <div class="testimonials-wrapper">
          <div class="testimonial-sliders">
            @foreach ($testimonials as $testimonial)
            <div class="item">
              <div class="test-cont">
                <p>{{$testimonial->comment}}</p>
              </div>
              <div class="test-bot">
                <div class="tst-img"><img src="{{asset('storage/'.$testimonial->picture)}}" alt="Customer's image" class="img-responsive"></div>
                <div class="client_name">
                  <h5><a href="testimonials.html">{{$testimonial->name}} - <span>{{$testimonial->designation}}</span></a></h5>
                  <ul>
                    @for ($i = 0; $i < $testimonial->stars; $i++)
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    @endfor
                    @for ($i = 0; $i < 5 - $testimonial->stars; $i++)
                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                    @endfor
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Testimonials  Resort-->
      <!-- News and Events  style-->
      <section class="clearfix news-wrapper">
        <section class="container clearfix common-pad">
          <div class="sec-header">
            <h2>News and Events</h2>
            <h3>Pick a room that best suits your taste and budget</h3>
          </div>
          <div class="row event-pad">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="news-evn-img"><a href="news-details.html"><img src="{{asset('assets/images/event/1.jpg')}}" alt="" class="img-responsive"></a>
                <div class="event-date">
                  <h3>05 <small>Aug</small></h3>
                </div>
              </div>
              <div class="news-evn-cont">
                <div class="news-meta"><a href="#">By: Anjori Meyami</a><a href="news-details.html"> Comments: 6</a></div><a href="#">
                  <h3>The Surprising Reason College Tuition Is Crazy Expensive</h3></a>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium totam rem aperiam</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="news-evn-img"><a href="news-details.html"><img src="{{asset('assets/images/event/2.jpg')}}" alt="" class="img-responsive"></a>
                <div class="event-date">
                  <h3>05 <small>Aug</small></h3>
                </div>
              </div>
              <div class="news-evn-cont">
                <div class="news-meta"><a href="#">By: Anjori Meyami</a><a href="news-details.html"> Comments: 6</a></div><a href="#">
                  <h3>The Surprising Reason College Tuition Is Crazy Expensive</h3></a>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium totam rem aperiam</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="news-evn-img"><a href="news-details.html"><img src="{{asset('assets/images/event/3.jpg')}}" alt="" class="img-responsive"></a>
                <div class="event-date">
                  <h3>05 <small>Aug</small></h3>
                </div>
              </div>
              <div class="news-evn-cont">
                <div class="news-meta"><a href="#">By: Anjori Meyami</a><a href="news-details.html"> Comments: 6</a></div><a href="#">
                  <h3>The Surprising Reason College Tuition Is Crazy Expensive</h3></a>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium totam rem aperiam</p>
              </div>
            </div>
          </div>
        </section>
      </section>
      <!-- News and Events  style-->
     
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