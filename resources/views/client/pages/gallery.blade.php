@extends('client.layout.master')
@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Gallery</h1>
            <div class="custom-breadcrumbs">
              <a href="{{route('client.index')}}">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Gallery</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_1.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_1.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_2.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_2.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_3.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_3.jpg') }}">
            </a>
          </div>

          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_4.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_4.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_5.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_5.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_6.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_6.jpg') }}">
            </a>
          </div>

          <div class="col-md-6 col-lg-6 item">
            <a href="{{ asset('client/images/sq_img_11.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_11.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-6 item">
            <a href="{{ asset('client/images/sq_img_2.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_2.jpg') }}">
            </a>
          </div>

          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_7.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_7.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_8.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_8.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_9.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_9.jpg') }}">
            </a>
          </div>

          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_10.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_10.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_11.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_11.jpg') }}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{ asset('client/images/sq_img_12.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ asset('client/images/sq_img_12.jpg') }}">
            </a>
          </div>

        </div>
      </div>
    </section>
@endsection