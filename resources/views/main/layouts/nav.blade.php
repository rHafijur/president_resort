    <!-- .hidden-bar-->
    <section id="sidebarCollapse" class="side-menu">
        <button type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse" class="close-button"><i class="fa fa-times"></i></button>
        <div class="side-menu-widget about-widget"><a href="index.html" class="logo"><img src="{{asset('assets/images/icon/lr-home.png')}}" alt="Awesome Image"></a>
          <h3 class="title playball-font">Welcome to Resort</h3>
          <!-- /.title playball-font-->
          <p>Edolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit.</p>
        </div>
        <!-- /.side-menu-widget-->
        <div class="side-menu-widget gallery-widget">
          <div class="title-box">
            <h4>From Our Gallery</h4><span class="decor-line inline"></span>
          </div>
          <!-- /.title-box-->
          <ul class="list-inline">
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/1.jpg')}}" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/2.jpg')}}" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/3.jpg')}}" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/4.jpg')}}" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/5.jpg')}}" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/6.jpg')}}" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/7.jpg')}}" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="{{asset('assets/images/gallery-thumb/8.jpg')}}" alt="Awesome Image"></a></li>
          </ul>
          <!-- /.list-inline-->
          <ul class="contact-info">
            <li>hello@youremail.com</li>
            <li>+1234567890</li>
          </ul>
          <!-- /.contact-info-->
        </div>
        <!-- /.side-menu-widget-->
        <div class="side-menu-widget subscribe-widget">
          <div class="title-box">
            <h4>Subscribe for our Special Offers</h4><span class="decor-line inline"></span>
          </div>
          <!-- /.title-box-->
          <form action="#" class="clearfix">
            <input type="text" placeholder="Enter email address">
            <button type="submit" class="res-btn">Subscribe</button>
          </form>
        </div>
      </section>
      <!-- /.side-menu-->
      <nav id="main-navigation-wrapper" class="navbar navbar-default transBg-main-menu-header _fixed-header _light-header stricky">
        <div class="container">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="{{route("home")}}" class="navbar-brand"><img alt="Logo" src="{{asset('storage/'.setting('site.logo'))}}" class="default-logo"><img src="{{asset('storage/'.setting('site.logo'))}}" alt="Logo" class="secondary-logo"></a>
          </div>
          <div id="main-navigation" class="collapse navbar-collapse">
            {!!menu('User Main', 'bootstrap');!!}
            <!-- /.nav navbar-right-->
            {{-- <form action="#" class="nav-search-form row">
              <div class="input-group">
                <input type="search" placeholder="Type here for search" class="form-control"><span class="input-group-addon">
                  <button type="submit"><i class="icon icon-Search"></i></button></span>
              </div>
            </form> --}}
          </div>
        </div>
      </nav>