@extends('main.layouts.master')
@section('content')
        <!-- Header  Inner style-->
        <section class="row final-inner-header">
            <div class="container">
              <h2 class="this-title">Gallery</h2>
            </div>
          </section>
          <section class="row final-breadcrumb">
            <div class="container">
              <ol class="breadcrumb">
                <li><a href="{{route("home")}}">Home</a></li>
                <li class="active">Gallery</li>
              </ol>
            </div>
          </section>
          <!-- Header  Slider style-->
          <!-- About gallery style-->
          <section class="container clearfix common-pad-inner about-info-box">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="sec-header">
                  <h2>{{setting('gallery.gallery_title')}}</h2>
                  <h3>{{setting('gallery.gallery_subtitle')}}</h3>
                </div>
                <p>{{setting('gallery.gallery_overview')}}</p>
              </div>
            </div>
          </section>
          <!-- About gallery style-->
          <!-- gallery-->
          <section class="clearfix news-wrapper">
            <div id="gallery" class="container clearfix common-pad gallery-page-one">
              <!-- .gallery-filter-->
              <ul class="gallery-filter anim-5-all text-center">
                <li data-filter="all" class="active gallery-sorter"><span>All images</span></li>
                @foreach ($categories as $category)
                <li data-filter=".{{str_replace(" ","-",$category)}}" class="gallery-sorter"><span>{{$category}}</span></li>
                @endforeach
              </ul>
              <!-- /.gallery-filter-->
              <div class="row">
                <!-- .image-gallery-->
                <div data-filter-class="gallery-sorter" class="image-gallery">
                  @foreach ($images as $image)
                <!-- .single-gallery-->
                  <div class="single-gallery anim-5-all {{str_replace(" ","-",$image->category)}} masonryImage mix span-4">
                    <div class="img-holder hover"><img src="{{asset("storage/".$image->image)}}" alt="a">
                      <div class="content">
                        <div class="link-gallery">
                          <div class="media-right"><a rel="help" data-imagelightbox="g" href="{{asset("storage/".$image->image)}}"><i class="icon icon-DSLRCamera"></i></a></div>
                          <div class="media-bottom"><a href="#">{{$image->caption}}</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.single-gallery-->
                  @endforeach
                </div>
                <!-- /.image-gallery-->
              </div>
            </div>
          </section>
          <!-- gallery-->
@endsection